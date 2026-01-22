<?php
include_once "Usuario.php";


function accionBorrar ($login){    
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarUsuario($login);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
    header("Refresh:0 url='./index.php'");
}
 
function accionAlta(){
    $user = new Usuario();
    $user->nombre  = "";
    $user->login   = "";
    $user->password   = "";
    $user->comentario = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($login){
    $db = AccesoDatos::getModelo();
    $user = $db->getUsuario($login);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($login){
    $db = AccesoDatos::getModelo();
    $user = $db->getUsuario($login);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $user = new Usuario();
    $user->nombre  = $_POST['nombre'];
    $user->login   = $_POST['login'];
    $user->password   = $_POST['clave'];
    $user->comentario = $_POST['comentario'];
    $db = AccesoDatos::getModelo();
    $db->addUsuario($user);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $user = new Usuario();
    $user->nombre  = $_POST['nombre'];
    $user->login   = $_POST['login'];
    $user->password  = $_POST['clave'];
    $user->comentario = $_POST['comentario'];
    $db = AccesoDatos::getModelo();
    $db->modUsuario($user);
    
}
function accionIncrementarSaldo($array){
    $db = AccesoDatos::getModelo();
    for($i = 0; $i < count($array); $i++){
      $db->incrementarSaldo($array[$i]);
    }
}
function accionCambiarBloqueo($array){
    $db = AccesoDatos::getModelo();
    
    for($i = 0; $i < count($array); $i++){
      $user = $db->getUsuario($array[$i]);
      if(($user->bloqueo == 0)){
        $db->cambiarBloqueo1($array[$i]);
      }else{
        $db->cambiarBloqueo0($array[$i]);
      }
    }
} 