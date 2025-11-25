<?php
/**
 * Fichero: BiciElectrica.php 
 * Implementa la clase para la gestión de bicicletas eléctricas.
 */
class BiciElectrica {

    // Atributos privados 
    private $id;        // Identificador de la bicicleta (entero) [cite: 9]
    private $coordx;    // Coordenada X (entero) [cite: 10]
    private $coordy;    // Coordenada Y (entero) [cite: 11]
    private $bateria;   // Carga de la batería en tanto por ciento (entero) [cite: 12]
    private $operativa; // Estado de la bicicleta (true operativa - false no disponible) [cite: 13]

    /**
     * Constructor para inicializar el objeto BiciElectrica.
     * 
     */
    public function __construct($id, $coordx, $coordy, $bateria, $operativa) {
        $this->id = (int)$id;
        $this->coordx = (int)$coordx;
        $this->coordy = (int)$coordy;
        $this->bateria = (int)$bateria;
        $this->operativa = (bool)$operativa; 
    }

    /**
     * Métodos mágicos setter y getter 
     */
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    /**
     * Método __ToString 
     * Devuelve el id de la bicicleta y el estado de la batería.
     */
    public function __toString() {
        return "Identificador: $this->id Bateria $this->bateria %";
    }

    /**
     * Devuelve la distancia entre las coordenadas pasadas como parámetro
     * y las coordenadas de la bicicleta. 
     * Se aplica la fórmula de distancia entre dos puntos. 
     */
    public function distancia($x, $y) {
        $distX = $this->coordx - $x;
        $distY = $this->coordy - $y;
        // Fórmula: raíz cuadrada de ( (x2-x1)^2 + (y2-y1)^2 )
        return sqrt(pow($distX, 2) + pow($distY, 2));
    }
}

