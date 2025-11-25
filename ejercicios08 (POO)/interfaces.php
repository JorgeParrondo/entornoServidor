<?php
// Definición de la interfaz
//todos los que implementen la interfaz estan obligados a implementar los metodos   
interface Logger {
    public function log(string $mensaje);
}

// Clase que implementa la interfaz
class ArchivoLogger implements Logger {
    public function log(string $mensaje) {
        file_put_contents("log.txt", $mensaje . PHP_EOL, FILE_APPEND);
    }
}

// Otra clase que implementa la misma interfaz
class BaseDatosLogger implements Logger {
    public function log(string $mensaje) {
        // Código para guardar en base de datos
        echo "Guardando en BD: $mensaje";
    }
}

// Uso
$logger = new ArchivoLogger();
$logger->log("Se ha iniciado sesión");
?>