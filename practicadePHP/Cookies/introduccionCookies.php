<?php
//funciona como $_SESSION solo que cookie se debe declarar y se almacena en el navegador, en vez de en el servidor
setcookie("usuario", "Carlos", time() + 3600); // dura 1 hora
echo $_COOKIE["usuario"]; // "Carlos"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>