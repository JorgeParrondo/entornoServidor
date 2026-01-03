<?php
class Usuario
{
    private $usuario_id;
    private $email;
    private $usser;
    private $passwd;
    private $bloqueado;
    private $intentos;
    private $edad;
    private $nombre;
    private $ape1;
    private $ape2;

    
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