<?php
session_start();
require_once('bienvenida.php');
$dineroJugador = $_POST['dinero'];

if (! isset($_SESSION['disponible'])) {
    if ( empty($_POST['cantidadini'])) {
        require_once "bienvenida.php";
    } else {
        // Me ha indicado la cantidad
        $_SESSION['disponible'] = $_POST['dinero'];
        require_once  "apuesta.php";
    }
    // No continuo despues de mostrar los formularios
    exit();
}

?>



