<?php
session_start();
include_once 'funciones.php';
if(isset($_COOKIE['timeOut'])){
    $estaFuera = $_COOKIE['timeOut'];
}


if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {

            // ALMACENAR LOS PUNTOS EN FICHERO Y CERRAR LA SESION
            // SE USARIA anotarPuntos($_SESSION['dni'], $_SESSION['puntos']);
            require_once('vistas/login.php');  // MOSTRAR VISTA DE INICIAL
            session_destroy();//esto deberia ir antes
            $estaFuera = true; //activo mi cookie
            // --> aqui falta el setcookie() por eso no funciona el timeout;
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            // CAMBIAR LOS  PUNTOS DE LA SESION CON VALORES ALEATORIA
            $valorRandom = random_int(0,1);
            if($valorRandom == 1){
             $_SESSION['puntos'] += 50;
            }
            if($valorRandom == 0){
             $_SESSION['puntos'] += 50; //se me olvidó cambiar el -50
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
    // PROCESAR FORMULARIO LOGIN. ESTA BIEN 
    $dni = $_POST['dni'];
    $clave = $_POST['clave'];
    $puntos = $_POST['puntos'];

    // COMPROBAR QUE LOS PUNTOS SON NUMERICOS. ESTA PARTE ESTA BIEN TAMBIEN EXCEPTO POR LO DE SESSION DESTROY
    if(!is_numeric($puntos)){
        $msg =  "Tus puntos no son un numero";
        require_once('vistas/login.php');
    }else{
          if(validarCliente($dni, $clave) == false){ // COMPROBAR QUE DNI Y LA CLAVE SON CORRECTOS 
               $msg = "Dni o contraseña incorrecta";
               require_once('vistas/login.php');// SI NO ES CORRECTO MOSTRAR EL LOGIN CON UN ERROR
        }else{// ANOTAR PUNTOS Y DNI EN AL SESSION Y MOSTRAR LA VISTA DE PUNTOS
           $_SESSION['dni'] = $dni;
           $_SESSION['puntos'] = $puntos;
            include 'vistas/puntos.php';
     } 
   }
    //PARTE DE LA COOKIE si esta fuera devuelve true hace timeout de 10 mins
    $estaFuera = false;
    if($estaFuera == TRUE){
        $msg = "Estas vetado temporalmente por salirte ( son 10 minutos )";
        session_destroy();
        include_once('acceso.php');
    }

    //CUANDO HACE SESSION DESTROY EN SALIRSE ACTIVO LA COOKIE
    setcookie('timeOut',$estaFuera,time() + 600); //esto no va aqui, va mas arriba cuando cambia el valor a true
    
 
    
    
   
     
    
}



