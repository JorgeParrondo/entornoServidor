<?php
session_start();
include_once 'funciones.php';

if(isset($_COOKIE['bloqueo'])){
    session_unset();
    session_destroy();
    $msg = "BLOQUEO DE 10 minutos";
    include 'vistas/login.php';
    exit;
}

if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {
            anotarPuntos($_SESSION['dni'],$_SESSION['puntos']);
            setcookie("bloqueo", "1", time() + 600);
            include 'vistas/login.php';
            exit();
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            // CAMBIAR LOS  PUNTOS DE LA SESION CON VALORES ALEATORIA
            $aleatorio = random_int(1,2);
            $valorPuntos = random_int(10,50);
            if($aleatorio == 1){
                $_SESSION['puntos'] += $valorPuntos;
            }
            if($aleatorio == 2){
                $_SESSION['puntos'] -= $valorPuntos;
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


    if(!is_numeric($puntos)){
        $msg = "ERROR, el valor puntos tiene que ser numérico";
        include 'vistas/login.php';

      }else{
        if(validarCliente($dni,$clave) == true){
           $_SESSION['dni'] = $dni;
           $_SESSION['puntos'] = $puntos;
           include 'vistas/puntos.php';
                }else{
                     $msg = "ERROR: validación de usuario incorrecta";
                      include 'vistas/login.php';

        }
    }    
}



