<?php
class AccesoDatos{
    private static $modelo = null;
    private $dbh = null;

    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;
            self::$modelo = null;
        }
    }
    
    //Configuración de la base de datos
     public function __construct() {
    try {
        $dns = 'mysql:host=localhost;dbname=almacendb;charset=utf8';
        $this->dbh = new PDO($dns, 'root', '');
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión con la base de datos: " . $e->getMessage();
        exit();
    }
}


     public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
 
    //CONSULTA que devuelve la tabla de productos como un array que se mostrara al abrir la pagina
    public function seleccionarProductos() : array{
        $stmt= $this->dbh->prepare("SELECT * FROM productos where stock_disponible > 10");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt->execute();
       if ($stmt->execute()) {
            while ($obj = $stmt->fetch()) {
                $tproductos[] = $obj;
            }
        }
        return $tproductos;
    }
    //Alterar la tabla de los objetos que se seleccionan en un 10%
    public function descontarProductos($tproductos){
        $stmt = $this->dbh->prepare("UPDATE productos SET precio_actual = precio_actual * 0.9 WHERE producto_no = ? ");
        for($i = 0; $i < count($tproductos) ; $i++){
          $stmt->execute([$tproductos[$i]]);
        }    
    }
  }
?>