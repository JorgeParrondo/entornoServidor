<?php

   class Cliente{
       private $cod_cliente;
       private $nombre;
       private $clave;
       private $veces;
    
    
    
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
   
  
 ?>