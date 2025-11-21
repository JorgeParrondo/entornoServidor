<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
     <link href="web/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <form  method="post">
        <h2>Cambiar Contraseña del usuario PEPITO</h2>
        <h3><?= ($mensaje)??"" ?></h3>
        <div>
            <label for="current-password">Contraseña Actual:</label>
            <input type="password" id="current-password" name="password" required>
        </div>

        <div>
            <label for="new-password">Nueva Contraseña:</label>
            <input type="password1" id="new-password" name="password1" required>
        </div>

        <div>
            <label for="confirm-password">Repite la Nueva Contraseña:</label>
            <input type="password2" id="confirm-password" name="password2" required>
        </div>

        <div>
            <button type="submit" name="orden" value="cambiar">Actualizar Contraseña</button>
        </div>
    </form>

</body>
</html>