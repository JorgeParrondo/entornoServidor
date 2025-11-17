<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once('bienvenida.php');
}
// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad
$pedidos = [
    'Platano' => 0,
    'Naranjas' => 0,
    'Limones' => 0,
    'Manzanas' => 0,
];

$_SESSION['pedidos'] = $pedidos;

// Nuevo cliente: anoto en la sesión su nombre y creo su tabla de pedidos vacía
if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    echo "<h1> Bienvenido " .  $_SESSION['cliente'] . "</h1>";
}

// No hay definido un cliente todavía en la session 
if (!isset($_SESSION['cliente'])) {
    echo " <h1>Aún no hay un cliente registrado </h1>";
}


// Proceso las acciones 
if (isset($_POST["accion"])) {
  switch ($_POST["accion"]) {
     case " Anotar ":
        // Actualizo la tabla de pedidos en la sesión
        break;
    case " Anular ":
        // Vacío la tabla de pedidos en la sesión
        
        break;
    case " Terminar ":
           // Destruyo la sesión y vuelvo a la página de bienvenida
           session_destroy();
            header("Refresh:3; url=\"".$_SERVER['PHP_SELF']."\"");
        break;
            

}
}


$compraRealizada = htmlTablaPedidos();
require_once 'compra.php';


// Función axiliar que genera una tabla HTML a partir  la tabla de pedidos
// Almacenada en la sesión
function htmlTablaPedidos(): string
{
    $msg = "";
    return $msg;
}
