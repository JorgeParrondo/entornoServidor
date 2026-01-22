<?php
session_start();

require_once 'modelo/Hotel.php';
require_once 'modelo/AccesoDatos.php';
require_once 'tools.php';

$ciudad = $_GET['ciudad'];

    $ac = AccesoDatos::initModelo();
    //recoge en la tabla la consulta de hoteles en orden descendente
    $tabla = $ac->buscaCiudad($ciudad);
  
    //si la tabla devuelve null en el primer hueco es que no se ha
    // cumplido el select y no existe ninguna ciudad con ese nombre que no tenga datos
    if($tabla[1] == null){
       $ciudad;
       include_once "vistas/error.php";
    }else{
        //guardo la tabla para ver en el listado y ciudad en variable sesion para mostrarlo en index
        $_SESSION['ciudad'] = $ciudad;
        $tabla;
        include_once "vistas/listado.php";
      }
    

