<?php
session_start();

// 1. Generar token CSRF si no existe en cookie
if (!isset($_COOKIE['csrf_token'])) {
    $token = bin2hex(random_bytes(32)); // token seguro de 64 caracteres
    setcookie('csrf_token', $token, time() + 3600, "/", "", false, true); 
    // última opción "httponly" evita JS acceda a la cookie
} else {
    $token = $_COOKIE['csrf_token'];
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Formulario seguro</h2>

<form action="procesar.php" method="POST">
    Nombre: <input type="text" name="nombre"><br><br>

    <!-- 2. Token oculto -->
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">

    <input type="submit" value="Enviar">
</form>

</body>
</html>
