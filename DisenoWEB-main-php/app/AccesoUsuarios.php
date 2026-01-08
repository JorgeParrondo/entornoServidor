<?php

include_once ('../dat/Usuario.php');
include_once ('config.php');

class AccesoUsuarios {

    private static $modelo = null;
    private $dbh = null;

    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoUsuarios();
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

    public function getUsuario (String $email, String $passwd) {
        $usr = false;
        $stmt_usuario = $this->dbh->prepare("select * from usuarios where email =? and passwd =?");
        $stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'usuario');
        $stmt_usuario->bindParam(1, $email);
        $stmt_usuario->bindParam(2, $passwd);
        if ($stmt_usuario->execute()) {
            if ($obj = $stmt_usuario->fetch()) {
                $usr = $obj;
            }
        }
        return $usr;
    }

    public function getUsuarioAdm (String $email) {
        $usr = false;
        $stmt_usuario = $this->dbh->prepare("select * from usuarios where email =?");
        $stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'usuario');
        $stmt_usuario->bindParam(1, $email);
        if ($stmt_usuario->execute()) {
            if ($obj = $stmt_usuario->fetch()) {
                $usr = $obj;
            }
        }
        return $usr;
    }

    public function getUsuarios(): array {
        $tusser = [];
        $stmt = $this->dbh->prepare("SELECT * FROM usuarios");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        if ($stmt->execute()) {
            while ($obj = $stmt->fetch()) {
                $tusser[] = $obj;
            }
        }
        return $tusser;
    }

    public function addUsuario($usuario): bool {
        try {
            $stmt = $this->dbh->prepare(
                "INSERT INTO usuarios (`email`, `usser`, `passwd`) VALUES (?, ?, ?)"
            );
            $stmt->execute([$usuario->email, $usuario->usser, $usuario->passwd]);

            return $stmt->rowCount() === 1;

        } catch (PDOException $e) {
            error_log("Error al insertar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function borrarUsuario($login): bool {
        try {
            $stmt = $this->dbh->prepare("DELETE FROM usuarios WHERE login = ?");
            $stmt->bindParam(1, $login);
            $stmt->execute();
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al borrar usuario: " . $e->getMessage());
            return false;
        }
    }
}
?>