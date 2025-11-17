<?php
session_start();
require_once "precios.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once('bienvenida.php');
}
// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad
if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = [
        'Platanos' => 0,
        'Naranjas' => 0,
        'Limones' => 0,
        'Manzanas' => 0,
    ];
}


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
    $fruta = $_POST["fruta"];
    $cantidad = $_POST["cantidad"];
  switch ($_POST["accion"]) {
    case " Anotar ":
        // Actualizo la tabla de pedidos en la sesión
     foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
    if ($_POST['fruta'] == $fruta) {
        $_SESSION['pedidos'][$fruta] += $_POST['cantidad'];
    }
}
    
      
    
    break;
    case " Anular ":
        // Vacío la tabla de pedidos en la sesión
       $_SESSION['pedidos'] = [
    'Platanos' => 0,
    'Naranjas' => 0,
    'Limones' => 0,
    'Manzanas' => 0,
  ];
        break;
    case " Terminar ":
           // Destruyo la sesión y vuelvo a la página de bienvenida
         $compraRealizada = htmlTablaPedidos();
         require_once('despedida.php');
         session_destroy();
         exit();

        break;
}
}


$compraRealizada = htmlTablaPedidos();
require_once 'compra.php';


// Función axiliar que genera una tabla HTML a partir  la tabla de pedidos
// Almacenada en la sesión
function htmlTablaPedidos(): string
{
    global $precios;
       $msg = "";
    $importeTotal = 0;
    $msg .= "<table>";
    $msg .= "<th> Fruta </th><th> Cantidad x Importe </th> <th> Subtotal </th>";
    foreach ( $_SESSION['pedidos'] as $fruta => $cantidad){
        $precio = $precios[$fruta];
        $importe = $precio * $cantidad;
        $importeTotal += $importe;
        $msg .= "<tr>";
        $msg .= "<td> $fruta </td>";
        $msg .= "<td> $precio x  $cantidad </td>";
        $msg .= "<td> $importe </td>";
        $msg .= "</tr>";
    }
    $msg .= " <tr><td colspan=2><b> Importe total :</b></td><td> $importeTotal</td></tr>";
    $msg .= "</table>";
    return $msg;
}
