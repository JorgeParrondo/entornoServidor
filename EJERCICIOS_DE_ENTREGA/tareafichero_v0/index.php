<?php 
include_once 'util.php';
session_start();

$mensaje="";
if (!isset($_SESSION['usuario']) && !isset($_POST['orden'])){
    include_once 'vistas/acceso.php';
    die();
}

if ($_POST['orden'] ==  "entrar" ){
    if ( empty($_POST['username']) || empty($_POST['password'] )){
        $mensaje = " >>Introducir usuario y contraseña";
        include_once 'vistas/acceso.php';
    } else {
        if ( userOk($_POST['username'],$_POST['password']) ){
         $_SESSION['username'] = $_POST['username'];
        include_once 'vistas/cambiarcontra.php';
        } else {
        $mensaje = ">> Usuario y contraseña incorrecto";
        include_once 'vistas/acceso.php';
        }
    }
}

if ($_POST['orden'] ==  "cambiar" ){
    // Se cambiar si la contraseña antigua es correcta
    // Y las nuevas contraseñas son iguales sino volvemos
    // a mostrar cambiarcontra
    if ( empty($_POST['password']) || empty($_POST['password1']) || empty($_POST['password2']) ){
        $mensaje = " >> Complete todos los campos";
        include_once 'vistas/cambiarcontra.php';
    } else {
        if ( userOk($_SESSION['username'],$_POST['password']) ){
            if ( $_POST['password1'] != $_POST['password2']){
                $mensaje = " >> los valores de la contraseña no coinciden";
                include_once 'vistas/cambiarcontra.php';
            }else {
                updatePasswd($_SESSION['username'],$_POST['password1']);
                session_destroy();
                include_once 'vistas/resultado.php';
            }
        } else {
           $mensaje = " >>  Introduce la contraseña correcta";
           include_once 'vistas/cambiarcontra.php';
        }
            
    } 
}
    