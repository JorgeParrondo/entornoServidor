<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Bienvendido</title>
</head>
<body>
<div class="login-container">
    <h1> Bienvenido <?= $_SESSION['nombre'] ?> </h1>
    Su sesión se cerrará en <br>
    <?= $_SESSION['tiempo'] ?> segundos. <br>
    <br>
    <button onClick="window.location.href=window.location.href">Recargar</button>

</div>
</body>
</html>