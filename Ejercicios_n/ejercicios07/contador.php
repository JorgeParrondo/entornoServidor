<?php
$miFichero = fopen('contador.txt' , 'w');

$numeroAccesos = 1;

if(isset($_COOKIE['accesos'])){
    $numeroAccesos = $_COOKIE['accesos'];
    $numeroAccesos ++;
}

setcookie('accesos', $numeroAccesos, time() + 3600 * 24 * 4  * 3);//setcookie SIEMPRE DEBE IR DESPUES DE QUE SE TENGA EL VALOR QUE SE QUIERE GUARDAR EN ESTE


fputs($miFichero, $numeroAccesos);
fclose($miFichero);


$miFicheror = fopen('contador.txt' , 'r');
$accesoFichero = fgets($miFicheror);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7.1</title>
</head>
<body>
    <h1>Bienvenido al controlador de cookies </h1>
    Esta es la vez numero <?= $numeroAccesos ?> que entras. <br>
    Mi fichero de cookies detecta que es la vez numero <?= $accesoFichero ?> que entras a esta página.
</body>
</html>