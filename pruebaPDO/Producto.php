<?php

// ---------------------------------------------------------
// 1. CLASE MODELO (Entidad)
// ---------------------------------------------------------
class Producto {
    public $id;
    public $nombre;
    public $precio;
    public $stock;

    public function __get($name){
        if (property_exists($this,$name)){
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
       if( property_exists($name, $value)){
        $this->$name = $value;
       }
    }
    // Método auxiliar para mostrar info
    public function info() {
        return "[ID: {$this->id}] {$this->nombre} - Precio: {$this->precio}$ (Stock: {$this->stock})";
    }
}

?>