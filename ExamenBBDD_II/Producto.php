<?php
class Producto
{
    private $producto_no;
    private $descripcion;
    private $precio_actual;
    private $stock_disponible;


    // Getter con método mágico
    function __get($name){
        if(property_exists($this, $name)) {
            return $this->$name;
        }
    }
    // Setter con método mágico
    function __set($name,$valor){
        if(property_exists($this, $name)) {
            $this->$name = $valor;
        }
    }
}
?>