<?php

class Coche{
   private $matricula;
   protected $precio; //protegido --> lo pueden ver tambien las clases que lo utilizan
   public $estado;
   

   function __construct(string $matricula){ //__construct es un metodo universal de php para constructores de objetos
       $this->matricula = $matricula;
       $this->precio = 0;
       $this->estado = false;
   }
   
   function __toString(){
    return "info -->" . $this->precio . " : " . $this->matricula;
   }


   function fijarprecio ( int $precionuevo){
     $this->precio = $precionuevo;
   }
   function mostrarinfo () : string{
    return "INFO: " .  $this->precio . " : " . $this->matricula;
   }
}

$c1 = new Coche("2333hzx");
$c1->estado = false;
$c1->fijarprecio(4000);
echo $c1->mostrarinfo();


// SALIDA -->  INFO:  4000 : 2333 hzx







?>