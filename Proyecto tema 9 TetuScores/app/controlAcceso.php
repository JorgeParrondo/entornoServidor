<?php
session_start(); // Siempre iniciar sesión al principio

include_once '../dat/AccesoDatos.php';
include_once '../dat/Usuario.php';

// Solo procesar POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['action'] ?? '';

    if ($accion === 'login') {
        // Campos del login
        $email = trim($_POST['email'] ?? '');
        $passwd = trim($_POST['password'] ?? '');

        // Validación básica
        if (empty($email) || empty($passwd)) {
            echo "Por favor, complete todos los campos.";
            exit();
        }

        $ac = AccesoDatos::getModelo();
        $usr = $ac->getUsuario($email);

        if (!$usr) {
            echo "Usuario no encontrado";
            exit();
        }

        if (password_verify($passwd, $usr->passwd)) {
            // Guardar última acción
            $_SESSION['ultimaAccion'] = time();
            $_SESSION['email'] = $usr->email;
            // Redirigir según tipo de usuario
            if ($usr->rol === "admin") {
                header("Location: ../layouts/admin/administrador.php");
                $_SESSION['administrador'] = 1;
            } else {
                header("Location: ../layouts/home.php");
            }
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta";
            exit();
        }

    } elseif ($accion === 'register') {
        // Campos del registro
        $usser = trim($_POST['usserRegistro'] ?? '');
        $email = trim($_POST['emailRegistro'] ?? '');
        $passwd = trim($_POST['passwordRegistro'] ?? '');

        // Validación básica
        if (empty($usser) || empty($email) || empty($passwd)) {
            echo "Por favor, complete todos los campos del registro.";
            exit();
        }

        // Hashear la contraseña antes de guardar
        $passwdHasheada = password_hash($passwd, PASSWORD_DEFAULT);
        $db = AccesoDatos::getModelo();
        $db->addUsuario((object)[
            'usser' => $usser,
            'email' => $email,
            'passwd' => $passwdHasheada
        ]);

        // Iniciar sesión automáticamente después de registrar
        $_SESSION['ultimaAccion'] = time();
        $_SESSION['usuario'] = $usser;
        header("Location: ../layouts/home.php");
        exit();
    } else {
        echo "Acción no válida.";
        exit();
    }
} else {
    echo "Método no permitido.";
    exit();
}
?>
