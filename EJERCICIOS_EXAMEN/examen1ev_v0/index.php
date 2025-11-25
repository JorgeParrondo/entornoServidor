<?php
include_once 'funciones.php';
session_start();
 //siempre que se abre una aplicación por defecto da get
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
      require_once('acceso.php');
    }else{ //si es post es que se ha rellenado todo correctamente 
    //obtenemos los datos del formulario para llamar a la funcion accesoValido
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tiempo = $_POST['time'];
   
    if (accesoValido($username,$password) == true) {
    //si el acceso es valido anota en la sesion las variables para anotar el usuario y su acceso
        $_SESSION["username"] = $username;
        $_SESSION["tiempo"] = $tiempo;
        $_SESSION["tiempolimite"] = time() + $tiempo;
        require_once('bienvenido.php');
    } else { //si no es valido manda de nuevo a acceso;
        $msg = " Nombre y contraseña incorrectos";
        include ("acceso.php");
    }
         
    }
    //si time es mayor significa que $tiempo todavia no se ha consumido
    if ( isset ($_SESSION["tiempolimite"]) ){
     if ( time() > $_SESSION["tiempolimite"]  ){
        session_destroy();
     } else {
        $_SESSION["tiempo"] = $_SESSION["tiempolimite"] - time();
        include 'bienvenido.php';
        exit();     
    }
}
