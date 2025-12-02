<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.3</title>
</head>
<body>
<?php

$inicio = microtime(true);

$contador = 0;
$consecutivos = 0;    

do {
    $num = rand(1, 10);   
    $contador++;

    if ($num === 6) {
        $consecutivos++;
    } else {
        $consecutivos = 0;
    }

} while ($consecutivos < 3);


$fin = microtime(true);
$tiempo = ($fin - $inicio) * 1000; 
echo "Han salido tres 6 seguidos tras generar $contador números en " . number_format($tiempo, 3) . " milisegundos.";
?>
</body>
</html>