<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ingreso - App de Citas</title>
</head>
<body>
    <div class="login-container">
        <h1>Bienvenido a DateMatch</h1>
        <?= $msg??'' ?><br>
        <form id="login-form" method="POST">
            <input type="text" id="username" name="username" placeholder="Id de usuario" required>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
            <input type="number" id="time" name="time" placeholder="Tiempo de conexión" value=10 required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
