<?php
session_start();
include_once 'funciones.php';
$estaFuera = false;
 if (isset($_COOKIE['timeout']) && $_COOKIE['timeout'] == 1) {
    $estaFuera = true;
 }


if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {

            // ALMACENAR LOS PUNTOS EN FICHERO Y CERRAR LA SESION
            anotarPuntos($_SESSION['dni'], $_SESSION['puntos']);
            $estaFuera = true;
            setcookie('timeout', $estaFuera, time() + 60 * 10);
            session_destroy();
            include_once('vistas/login.php');
            // MOSTRAR VISTA DE INICIAL
            exit();
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            // CAMBIAR LOS  PUNTOS DE LA SESION CON VALORES ALEATORIA
            $apuesta = random_int(1,50);
            $resultado = random_int(0,1);
            if($resultado == 0){
                 $_SESSION['puntos'] += $apuesta;
            }
            if($resultado == 1 ){
                 $_SESSION['puntos'] -= $apuesta;
            }
            if ($_SESSION['puntos'] <= 0) {
                $_SESSION['puntos'] = 0;
            }
        }
    } 
    include 'vistas/puntos.php';
}




if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
        include 'vistas/login.php';
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
       // PROCESAR FORMULARIO LOGIN
      $dni = $_POST['dni'];
      $clave = $_POST['clave'];
      $puntos = $_POST['puntos'];
 
    
    // COMPROBAR QUE LOS PUNTOS SON NUMERICOS
    if(!is_numeric($puntos)){
        $msg  = "Los puntos introducidos no son numericos";
        include_once('vistas/login.php');
        session_destroy();
          }else if(validarCliente($dni,$clave) == false ){ // COMPROBAR QUE DNI Y LA CLAVE SON CORRECTOS
             $msg  = "dni o clave incorrectos, por favor, intentelo de nuevo"; // SI NO ES CORRECTO MOSTRAR EL LOGIN CON UN MENSAJE DE ACCESO
             include_once('vistas/login.php');
             session_destroy();
                 } else if($estaFuera === true){
                     $msg = "Ha sido vetado de nuestro sistema durante 10 minutos por salir";
                     session_destroy();
                      }else {
                          $_SESSION['dni'] = $dni;
                          $_SESSION['puntos'] = $puntos;
                          include_once('vistas/puntos.php');
 }   
}



