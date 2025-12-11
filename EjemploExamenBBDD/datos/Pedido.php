<?php


 class Pedido{
    private $numped;
    private $cod_cliente;
    private $producto;
    private $precio;


    function __get ($name ){
        if ( property_exists($this,$name)){
            return $this->$name;
        }
    }

    function __set ($name,$value){
        if ( property_exists($this,$name)){
            return $this->$name = $value;
        }
    }
}