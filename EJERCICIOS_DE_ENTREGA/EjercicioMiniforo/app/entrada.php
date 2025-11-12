<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php if($_SERVER['REQUEST_METHOD'] == 'GET') : ?>
    <h1>Mini foro Versión 1.0</h1>
    <form action= 'comentario.html' method = "post">
    USUARIO: <input type="text" name="usuario" id="usuario" required> <br> 
    CONTRASEÑA: <input type="password" name="clave" id="clave" required> <br> 
    <input type="submit" value="Acceder">
    </form>
   <?php endif ?>
 
</body>

<style>
        h1{
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        input[type="text"], input[type="number"], select, input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        body {
    
            background-color: #576fbeff;
            padding: 20px;
            font-family: "Lucida Console", "Courier New", monospace;
        }
</style>
</html>
