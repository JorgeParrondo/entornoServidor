<?php
session_start(); //Hay que meterlo para que funcione el session token, lo comparten tanto acceso como ejercicio01(porque se usas en la misma sesion / navegador)

define('CUENTAFICHERO', 'misaldo.txt'); //define CUENTAFICHERO A misaldo.txt, son lo mismo

// NO está definido el token
if (!isset($_SESSION['token'])) {
header('Location: acceso.php?msg=Error+de+acceso 1');
exit();
} else {
    $msg = "Token definido";
    header('Location: acceso.php?msg=Token+correcto');

}
//Para evitar un ataque, este codigo comprueba que el token de nuestra session es el mismo que el token que nosotros enviamos en el formulario
if( $_SESSION['token'] != $_POST['token']){
    $msg = "Error de acceso";
    header("Location: acceso.php?msg=".urlencode($msg));

}

//Este fragmento recoge la orden ver saldo de acceso.php y el saldo de misaldo.txt a traves de file get contents
$saldo = file_get_contents(CUENTAFICHERO); //usar file get contents abre y cierra el fichero por si solo

if($_POST['Orden'] == 'Ver saldo'){
 $msg = "Su saldo actual es " . number_format($saldo,2,',','.');
 header("Location: acceso.php?msg=".urlencode($msg));
 exit();
}

//Comprueba que el importe esta correcto
if (empty($_POST['importe']) || !is_numeric($_POST['importe']) || $_POST['importe'] <= 0){
    $msg ="Importe Erróneo o importe menor de 0 ";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

//Registra la variable importe con lo que se recibe del formulario y se añade a saldo en el archivo CUENTAFICHERO
$importe = $_POST['importe'];


//FILE_APPEND evita que se machaque el fichero
if ( $_POST['Orden'] == 'Ingreso'){
    $saldo = $saldo + $importe;
    file_put_contents(CUENTAFICHERO,$saldo, FILE_APPEND); //file put contents maneja automaticamente el fichero
    $msg = "Operacion realizada";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}


//Reintegro hace lo que hace ingreso pero al reves 
if ( $_POST['Orden'] == 'Reintegro'){
   if($importe <= $saldo) {
   $saldo = $saldo - $importe; 
   file_put_contents(CUENTAFICHERO,$saldo);
   }else{
    $msg ="ERROR, el saldo es menor que el reintegro";
   }
    $msg = "Operacion realizada";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}


