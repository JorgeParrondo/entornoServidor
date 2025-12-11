<?php
 include_once 'datos/AccesoDatos.php';
 include_once 'datos/Cliente.php';
 include_once 'datos/Pedido.php';

 $nombre = $_GET['nombre'];
 $clave = $_GET['clave'];

 //esta sentencia funciona simepre igual,RECORDAR :: SIEMPRE PARA LLAMAR METODOS ESTÁTICOS
 $ac = AccesoDatos::getModelo();//es basicamente para crear el acceso a nuestra base de datos 
 $cli = $ac->getCliente($nombre,$clave);
 if($cli){
    $tpedidos = $ac->getPedidos($cli->cod_cliente);
    $ac->incrementarVeces($cli->cod_cliente);
    echo 'MOSTRANDO LOS PEDIDOS DEL CLIENTE ' . $cli->cod_cliente . 'Total = ' . count($tpedidos);
    //include 'vistas/vistapedidos.php';
 }else{
    echo 'No se encuentra';
}


 ?>