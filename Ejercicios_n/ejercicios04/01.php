<?php

 $usuarios = [
    'Jorge' => '1234',
    'Nigga' => "xxxx",
    'Hola'  => "jaja"
 ]; 

 $msg ="";
 $error = false;
   if( empty($_REQUEST['nombre'])  || empty($_REQUEST['clave']) ){
    $msg = "ERROR,Introduzca tanto el usuario como la clave ";
    $error = true;
   }else{
    $usuario = $_REQUEST['nombre'];
    $clave = $_REQUEST['clave'];
    if (array_key_exists($usuario, $usuarios) && $usuarios[$usuario] == $clave){
        $msg = "Bienvenido al sistema $usuario"; 
    }else{
        $msg = "ERROR, el usuario  no existe . </br>";
        $error = true;
    }
   }
 ?>

 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 400px;">
        <div id="header">
            <h1>Procesando formulario</h1>
        </div>

        <div id="content">
            <?= $msg ?>
            <?php if ($error) : ?>
                <button onclick='window.history.back();'>Volver</button>
            <?php endif ?>
        </div>
    </div>
</body>

</html>