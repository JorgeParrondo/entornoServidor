<?php
class Animal {
    public $nombre;

    public function comer() {
        echo "$this->nombre está comiendo";
    }
}

// Herencia
class Perro extends Animal {
    public function ladrar() {
        echo "$this->nombre dice guau";
    }
}

// Uso
$miPerro = new Perro();
$miPerro->nombre = "Fido";
$miPerro->comer(); // heredado de Animal
$miPerro->ladrar(); // propio de Perro

?>