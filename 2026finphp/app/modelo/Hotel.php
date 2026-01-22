<?php 

class Hotel {

    private $cod_hotel;
    private $ciudad;
    private $nombre;
    private $categoria;
    private $precio_noche;
    private $habitaciones_disponibles;
    
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