<?php
  
  class coche{
    public $color;
    protected $marca;
    private $nombre;
  
    function __construct($color,$marca,$nombre) {
       $this->color = $color;
       $this->marca = $marca;
       $this->nombre = $nombre;
  }
    function mostrarNombre(){
        echo "soy el coche " . $this->nombre;
    }
 }


    $c1 = new coche('rojo', 'citroen', 'paco');
    $c1->mostrarNombre();



  class Padre {
    public function __construct($nombre) {
        echo "Hola $nombre\n";
    }
}

class Hija extends Padre {
    public function __construct($nombre, $edad) {
        parent::__construct($nombre); // llamas al constructor del padre
        echo "Edad: $edad\n";
    }
}

$h = new Hija("Ana", 20);

  ?>