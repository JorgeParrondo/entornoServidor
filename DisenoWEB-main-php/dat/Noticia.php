<?php
class Noticia
{
    private $noticia_id;
    private $titulo;
    private $contenido;
    private $autor;
    private $fecha;
    private $visible;
    
    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con método mágico
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }
}
?>