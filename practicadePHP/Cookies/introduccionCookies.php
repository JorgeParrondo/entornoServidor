<?php
$nombre = 'javier';

//funciona como $_SESSION solo que cookie se debe declarar y se almacena en el navegador, en vez de en el servidor
$nombre = $_POST['nombre'];
if(isset($_COOKIE['usuario'])){
    $nombre = $_COOKIE['usuario'];
}
// dura 1 hora
echo $_COOKIE["usuario"]; // "Carlos"

setcookie("usuario", $nombre, time() + 3600); 
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