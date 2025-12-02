<?php

//permite usar metodos sin necesidad de heredar

// Definición de un trait
trait Saludo {
    public function decirHola() {
        echo "Hola!";
    }
    public function despedirse(){
        echo 'adios';
    }
}

// Clase que usa el trait
class Persona {
    use Saludo;
}

class Robot {
    use Saludo;
}

// Uso
 // Muestra "Hola!"


$r = new Robot();
echo $r->decirHola(); // También muestra "Hola!"
echo $r->despedirse();
?>