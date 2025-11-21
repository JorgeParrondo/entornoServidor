<?php 
include_once 'util.php';
session_start();

$mensaje="";
if (!isset($_SESSION['usuario']) && !isset($_POST['orden'])){
    include_once 'vistas/acceso.php';
    die();
}

if ($_POST['orden'] ==  "entrar" ){
    // Campos de usuario y contraseña rellenos
    // con valores correctos
    // Actualizo variable de sesión
    // Si falla muestro acceso.php
    include_once 'vistas/cambiarcontra.php';
 
}

if ($_POST['orden'] ==  "cambiar" ){
    // Comprobar que los campos están llenos
    // Se cambiar si la contraseña antigua es correcta
    // Y las nuevas contraseñas son iguales sino volvemos
    // a mostrar cambiarcontra
    // si falla muestro cambiarcontra.php
    include_once 'vistas/resultado.php';
  
}
    

