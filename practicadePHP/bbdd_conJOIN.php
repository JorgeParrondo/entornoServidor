<?php

/*
 * Acceso a datos con BD y Patrón Singleton
 *
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    
    // Auxiliar para genera el formulario
    private static $select0 = " SELECT CLIENTE_NO, NOMBRE FROM CLIENTES";
        
    //Mostrar productos con precio superior un valor ordenado por descripción.
    private static $select1 = "select * from PRODUCTOS where PRECIO_ACTUAL >= ? ORDER BY DESCRIPCION ";
    
    // Mostrar Total de pedidos y unidades pedidas por producto 
    private static $select2 = "";
    // Mostrar el departamento con mayor número de empleados.
    private static $select3 = "";
    // Mostrar Código y apellido de TODOS los empleados y ciudad donde trabajan.
    private static $select4 = "SELECT e.EMP_NO, e.APELLIDO, d.LOCALIDAD FROM EMPLEADOS e JOIN DEPARTAMENTOS d ON e.DEP_NO = d.DEP_NO;";

    // Mostrar productos no pedidos por un cliente determinado
    private static $select5 = "";
    
  
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
      
    }
    */