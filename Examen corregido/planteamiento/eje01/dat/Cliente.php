<?php 

class Cliente {

    function __construct(private $dni,private $nombre, private $clavehash, private $puntos ){

    }

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

