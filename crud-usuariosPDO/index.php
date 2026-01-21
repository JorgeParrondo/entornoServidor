<?php
session_start();
include_once 'app/funciones.php';
include_once 'app/acciones.php';


if (isset($_POST['numero'])) {
    if ($_POST['numero'] == 12345) {
        $_SESSION['usuario'] = 1;
        setcookie("activo", "1", time() + 3000);
        Header("Location: index.php");
        exit;
    } else {
        header("Location: app/layout/formulariopin.php");
        exit;
    }
}


if (!isset($_SESSION['usuario']) || !isset($_COOKIE['activo'])) {
    session_unset();
    session_destroy();
    header("Location: app/layout/formulariopin.php");
    exit;
}


// Div con contenido
$contenido="";
if ($_SERVER['REQUEST_METHOD'] == "GET" ){
    
    if ( isset($_GET['orden'])){
        switch ($_GET['orden']) {
            case "Nuevo"    : accionAlta(); break;
            case "Borrar"   : accionBorrar   ($_GET['id']); break;
            case "Modificar": accionModificar($_GET['id']); break;
            case "Detalles" : accionDetalles ($_GET['id']);break;
            case "Incrementar Saldo" : accionIncrementarSaldo($_GET['users']); break;
            case "Cambiar bloqueo" : accionCambiarBloqueo($_GET['users']); break;
            case "Terminar" : accionTerminar(); break;
            //case "Incrementar Saldo" : incrementarsaldo(); break;
        }
    }
} 
// POST Formulario de alta o de modificación
else {
    if (  isset($_POST['orden'])){
         switch($_POST['orden']) {
             case "Nuevo"    : accionPostAlta(); break;
             case "Modificar": accionPostModificar(); break;
             
             case "Detalles":; // No hago nada
         }
    }
}
$contenido .= mostrarDatos();
// Muestro la página principal
include_once "app/layout/principal.php";




