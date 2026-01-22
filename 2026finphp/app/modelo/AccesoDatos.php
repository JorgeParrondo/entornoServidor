<?php
require_once "Hotel.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos {
    
    private static $modelo = null;
    public $dbh = null;
    private $stmt = null;
    private $stmt_ciudad = null;

    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=hotelesDB;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo la consulta        
        

    }

    public function buscaCiudad($ciudad) {
      $thoteles[] = null;
      $stmt_ciudad = $this->dbh->prepare("select * from Hoteles where ciudad = ? ORDER BY precio_noche ASC");
      if ($stmt_ciudad->execute([$ciudad])) {
            while ($obj = $stmt_ciudad->fetch()) {
                $thoteles[] = $obj;
            }
        }
        return $thoteles;
    }

     // Evito que se pueda clonar el objeto.
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}
