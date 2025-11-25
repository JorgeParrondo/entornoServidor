<?php
session_start();

// 1. Comprobar que existe cookie y POST
if (!isset($_COOKIE['csrf_token']) || !isset($_POST['csrf_token'])) {
    die("CSRF detectado: token ausente.");
}

// 2. Comparar tokens de forma segura
if (hash_equals($_COOKIE['csrf_token'], $_POST['csrf_token'])) {

    // ✔ Token correcto → procesar datos
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');

    echo "Formulario enviado correctamente. Hola $nombre";

} else {
    // ❌ Token inválido → posible ataque
    die("CSRF detectado: token inválido.");
}
?>

