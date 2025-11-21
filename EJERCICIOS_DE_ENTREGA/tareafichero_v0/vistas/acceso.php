<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link href="web/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <form  method="post">
        <h2>Acceso</h2>
        <h3><?= ($mensaje)??"" ?></h3>
        <div>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <button type="submit" name="orden" value="entrar">Entrar</button>
        </div>
    </form>

</body>
</html>