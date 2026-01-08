<?php

include_once ('../dat/Noticia.php');
include_once ('config.php');

class AccesoNoticias {
    private static $modelo = null;
    private $dbh = null;

    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoNoticias();
        }
        return self::$modelo;
    }

    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }

    public function __construct() {
        try {
            $dns = 'mysql:host='.SERVER_DB.';dbname='.DATABASE_NAME;
            $this->dbh = new PDO($dns, DB_USER, '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión con la base de datos: ".$e->getMessage();
            exit();
        }
    }

    public function getNoticias() {
        $tnoticias = [];
        $stmt_noticias = $this->dbh->prepare("SELECT * FROM noticias ORDER BY fecha DESC");
        $stmt_noticias->setFetchMode(PDO::FETCH_CLASS, 'Noticia');
        if ($stmt_noticias->execute()) {
            while ($obj = $stmt_noticias->fetch()) {
                $tnoticias[] = $obj;
            }
        }
        return $tnoticias;
    }

    public function addNoticia (Noticia $noticia) {
        $stmt_noticia = $this->dbh->prepare("INSERT INTO noticias (titulo, contenido, autor, fecha, visible) VALUES (?, ?, ?, ?, ?)");
        $stmt_noticia->bindParam(1, $noticia->titulo);
        $stmt_noticia->bindParam(2, $noticia->contenido);
        $stmt_noticia->bindParam(3, $noticia->autor);
        $stmt_noticia->bindParam(4, $noticia->fecha);
        $stmt_noticia->bindParam(5, $noticia->visible);
        return $stmt_noticia->execute();
    }
}
?>