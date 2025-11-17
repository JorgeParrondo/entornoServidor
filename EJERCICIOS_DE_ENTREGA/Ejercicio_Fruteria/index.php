<?php
session_start();

// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad


// Nuevo cliente: anoto en la sesión su nombre y creo su tabla de pedidos vacía
if (isset($_GET['cliente'])) {
    
}

// No hay definido un cliente todavía en la session 
if (!isset($_SESSION['cliente'])) {
    
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
        break;
            

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
