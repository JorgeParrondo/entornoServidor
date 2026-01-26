<?php
session_start();
include_once ('../../app/funciones.php');
if(!isset($_SESSION['administrador'])){
    session_unset();
    session_destroy();
    header("Location: /php/DisenoWEB-main/index.php");
    exit();
}
// Control de sesion
controlInteraccion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? null;
    switch ($accion) {
        case "añadir":
            $newusuario = definirNewUsr();
            if (validarAddUser($newusuario)) {
                header("Location: admUsuarios.php?success=1");
            } else {
                header("Location: admUsuarios.php?error=1");
            }
            exit;
            break;
        case "eliminar":
            $usuario = definirUsr();
            validarDelUser($usuario);
            header("Location: admUsuarios.php");
            exit;
            break;
        // Dentro del switch ($accion) en admUsuarios.php:

        case "editar":
            $id_usuario = $_POST['id_usuario_edit'];
            $newUsuario = new Usuario();
            
            // Mapeo de todos los campos del formulario
            $newUsuario->usser       = trim($_POST['NewUsuario']);
            $newUsuario->email       = trim($_POST['NewEmail']);
            $newUsuario->nombre      = trim($_POST['NewNombre']);
            $newUsuario->ape1        = trim($_POST['NewApe1']);
            $newUsuario->ape2        = trim($_POST['NewApe2']);
            $newUsuario->partidos    = intval($_POST['NewPartidos']);
            $newUsuario->goles       = intval($_POST['NewGoles']);
            $newUsuario->asistencias = intval($_POST['NewAsistencias']);
            $newUsuario->faltas      = intval($_POST['NewFaltas']);
            $newUsuario->edad        = intval($_POST['NewEdad']);
            
            // Lógica de contraseña: solo se cambia si el admin escribe algo
            if (!empty($_POST['NewContraseña'])) {
                $newUsuario->passwd = password_hash($_POST['NewContraseña'], PASSWORD_DEFAULT);
            } else {
                $newUsuario->passwd = null; // Indicamos al modelo que no actualice la clave
            }
            
            if (validarEditUser($id_usuario, $newUsuario)) {
                header("Location: admUsuarios.php?edit_success=1");
            } else {
                header("Location: admUsuarios.php?error=1");
            }
            exit;
            break;
    }
}

// Definir usuario, a partir de la tabla generada
function definirUsr() {
    $usuario = new Usuario();
    $usuario->id_usuario = trim($_POST['usuario'] ?? '');
    return $usuario;
} 

// Definir usuario, a partir de los datos introducidos
function definirNewUsr() {
        $usuario = new Usuario();
        $usuario->usser = trim($_POST['NewUsuario'] ?? '');
        $usuario->passwd = $_POST['NewContraseña'];
        $usuario->email = $_POST['NewEmail'];
        return $usuario;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../../web/CSS/default.css"/>
    <link rel="stylesheet" href="../../web/CSS/adm/admin.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="administrador.php"><img src="../../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="admLiga.html">Liga</a></li>
            <li><a href="admNoticias.php">Noticias</a></li>
            <li><a href="admUsuarios.php">Usuarios</a></li>
        </ul>
    </div>

<!-- Contenedor principal de todo el contenido de la página -->
    <div id="content">
        <div id="content-table">
            <div id="content-header">
            <h1>Panel de Administrador de usuarios</h1>
            <div id="inputs-header">
                <input type="search" id="search-bar" class="search-bar" value="Search">
                <ul class="menu-order">
                    <li class="menu-order menu-order-dropdown">
                        <a href="#" class="menu-link">
                            <span>Ordenar</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#" class="sub-menu-item">Por fecha</a></li>
                            <li><a href="#" class="sub-menu-item">Por nombre</a></li>
                            <li><a href="#" class="sub-menu-item">Por id</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- MODAL AÑADIR -->
            <div id="modal-add" class="modal">
                <div class="modal-content">
                    <h2>Añadir usuario</h2>
                    <form class="modal-form" method="post">
                        <input type="hidden" name="accion" value="añadir">
                        <input type="text" name="NewUsuario" placeholder="Usuario">
                        <input type="email" name="NewEmail" placeholder="Email">
                        <input type="text" name="NewContraseña" placeholder="Contraseña" minlength="9">
                        <div class="modal-actions">
                            <input type="reset" class="close-modal" value="Cancelar"></button>
                            <input type="submit" class="confirm" value="Añadir">
                        </div>
                    </form>
                </div>
            </div>

            <!-- MODAL ELIMINAR -->
            <div id="modal-del" class="modal">
                <div class="modal-content">
                    <h2>Eliminar usuario</h2>
                    <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                    <form class="modal-form" method="post">
                        <input type="hidden" name="accion" value="eliminar">
                        <!-- usuario se añade por JS -->
                        <div class="modal-actions">
                            <input type="reset" class="close-modal" value="Cancelar">
                            <input type="submit" class="confirm" value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>

            <!-- MODAL EDITAR -->
            <div id="modal-edit" class="modal">
                <div class="modal-content">
                    <h2>Editar usuario</h2>
                    <form class="modal-form modal-form-edit" method="post">
                        <input type="hidden" name="accion" value="editar">
                        Usuario:<input type="text" name="NewUsuario" value="{}">
                        Correo:<input type="email" name="NewEmail" value="Email">
                        Contraseña:<input type="text" name="NewContraseña" value="Contraseña">
                        Partidos:<input type="text" name="NewPartidos" value="Partidos">
                        Goles:<input type="number" name="NewGoles" value="Goles">
                        Asistencias<input type="number" name="NewAsistencias" value="Assitencias">
                        Faltas:<input type="number" name="NewFaltas" value="Faltas">
                        Edad:<input type="number" name="NewEdad" value="Edad">
                        Nombre<input type="text" name="NewNombre" value="Nombre">
                        Primer apellido:<input type="text" name="NewApe1" value="Apellido1">
                        Segundo apellido:<input type="text" name="NewApe2" value="Apellido2">
                        <div class="modal-actions">
                            <input type="reset" class="close-modal" value="Cancelar">
                            <input type="submit" class="confirm" value="Guardar Cambios">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contenido">
            <?= mostrarUsusarios() ?>  
            <div class="table-actions">
                <a id="modal-btn-add"><i class='bx bx-plus-circle'></i> Añadir Nuevo Usuario</a>
            </div>
        </div>
    </div>
    <script src="../../web/JS/AdmUsuario.js" defer></script>
</body>
</html>