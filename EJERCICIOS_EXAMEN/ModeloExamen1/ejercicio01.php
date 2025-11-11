<?php
session_start(); //Hay que meterlo para que funcione el session token, lo comparten tanto acceso como ejercicio01(porque se usas en la misma sesion / navegador)

define('CUENTAFICHERO', 'misaldo.txt');

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
$saldo = file_get_contents(CUENTAFICHERO);

if($_POST['Orden'] == 'Ver saldo'){
 $msg = "Su saldo actual es $saldo";
 header("Location: acceso.php?msg=".urlencode($msg));
}