<?php
$nombre = $_POST['nombre'];
$resumen = $_POST['resumen'];
$prioridad = $_POST['prioridad'];
$hora = date("d:m:Y H:i");
$ip = $_SERVER['REMOTE_ADDR'];
switch($prioridad){
    case 1: $prioridad = 'urgente'; 
    case 2: $prioridad = 'alta'; 
    case 3: $prioridad = 'media'; 
    case 4: $prioridad = 'baja'; 
}
$resultado = $hora . ", " . $nombre . ", " . $resumen . ", " . $prioridad . ", " . $ip . PHP_EOL;
$fichero = @file_put_contents('incidencias.txt', $resultado, FILE_APPEND);
if(isset($fichero)){
    echo "Muchas gracias $nombre, se ha enviado su incidencia";
}else{
    die('ERROR, no se ha enviado el fichero ni su incidencia');
}
?>