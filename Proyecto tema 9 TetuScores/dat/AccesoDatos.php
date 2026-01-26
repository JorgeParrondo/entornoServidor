<!-- ACCESODATOS DE NOTICIAS Y USUARIOS CON SUS RESPECTIVAS FUNCIONES CON SQL -->
 <?php
 
 include_once __DIR__ . '/../app/config.php';
 include_once __DIR__ . '/Usuario.php';
 include_once __DIR__ . '/Noticia.php';
 
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
            $dns = 'mysql:host='.SERVER_DB.';dbname='.DATABASE_NAME;
            $this->dbh = new PDO($dns, DB_USER, '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión con la base de datos: ".$e->getMessage();
            exit();
        }
    }

    //-------------------------------------------------------------
    //FUNCIONES DE BBDD de noticias
    //-------------------------------------------------------------

    //getNoticias-->SELECT de las noticias con un FETCH en un bucle while para guardarlas en una tabla $tnoticias
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
    //addNoticia--> Funcion INSERT en la base de datos para los objetos noticia.
    public function addNoticia (Noticia $noticia) {
        /*
        $stmt_noticia = $this->dbh->prepare("INSERT INTO noticias (titulo, contenido, autor, fecha, visible) VALUES (?, ?, ?, ?, ?)");
        $stmt_noticia->bindParam(1, $noticia->titulo);
        $stmt_noticia->bindParam(2, $noticia->contenido);
        $stmt_noticia->bindParam(3, $noticia->autor);
        $stmt_noticia->bindParam(4, $noticia->fecha);
        $stmt_noticia->bindParam(5, $noticia->visible);
        return $stmt_noticia->execute();
        */
        try {
            $stmt = $this->dbh->prepare("INSERT INTO noticias (`titulo`, `contenido`, `autor`, `fecha`, `visible`) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$noticia->titulo, $noticia->contenido, $noticia->autor, $noticia->fecha, $noticia->visible]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al registrar usuario: " . $e->getMessage());
            return false;
        }
    }

    // Función DELETE en la base de datos para los objetos noticia.
    public function borrarNoticia($noticia) {
        error_log("INTENTANDO BORRAR NOTICIA: [" . $noticia . "]");
        try {
            $stmt = $this->dbh->prepare("DELETE FROM noticias WHERE id = ?");
            $stmt->bindValue(1, trim($noticia), PDO::PARAM_STR);
            $stmt->execute();
            error_log("FILAS AFECTADAS: " . $stmt->rowCount());
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al borrar noticias: " . $e->getMessage());
            return false;
        }
    }

    //-------------------------------------------------------------
    //FUNCIONES BBDD de usuarios
    //-------------------------------------------------------------

    //getUsuario--> Funcion SELECT para el control de acceso MVC, recibe un email y lo guarda en usr
    public function getUsuario (String $email){
        $stmt = $this->dbh->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $usr = $stmt->fetch();
        return $usr;
    }
    
    //Funcion de admin (no de acceso MVC) select para recoger una tabla que luego devolvera a ADMIN para ver
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

    //addUsuario--> funcion insert para añadir usuarios 
    public function addUsuario($usuario): bool {
        try {
            $stmt = $this->dbh->prepare("INSERT INTO usuarios (email, usser, passwd, rol) VALUES (?, ?, ?, ?)");
            $stmt->execute([$usuario->email, $usuario->usser, $usuario->passwd, 'default']);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al registrar usuario: " . $e->getMessage());
            return false;
        }
    }

    //borrarUsuario --> Funcion DELETE para borrar usuarios, borrando por el codigo de usuario o login
    public function borrarUsuario($usser): bool {
        error_log("INTENTANDO BORRAR USUARIO: [" . $usser . "]");
        try {
            $stmt = $this->dbh->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
            $stmt->bindValue(1, trim($usser), PDO::PARAM_STR);
            $stmt->execute();
            error_log("FILAS AFECTADAS: " . $stmt->rowCount());

            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al borrar usuario: " . $e->getMessage());
            return false;
        }
    }

    // Función update para editar los datos del usuario
    /*
    public function modificarPerfil($id_usuario, $newUsuario):bool{
        error_log("INTENTANDO MODIFICAR USUARIO: [" . $id_usuario . "]");
        try {
            $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id_usuario = ?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(1, $newUsuario->usser, PDO::PARAM_STR);
            $stmt->bindValue(2, $newUsuario->passwd, PDO::PARAM_STR);
            $stmt->bindValue(3, $newUsuario->email, PDO::PARAM_STR);
            $stmt->bindValue(4, $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            error_log("FILAS MODIFICADAS: " . $stmt->rowCount());
            return $stmt->rowCount() >= 0; 
        } catch (PDOException $e) {
            error_log("Error al modificar usuario: " . $e->getMessage());
            return false;
        }
    }
    */
    public function modificarPerfil($id_usuario, $newUsuario): bool {
        try {
            $sql = "UPDATE usuarios SET usser = ?, email = ?, nombre = ?, ape1 = ?, ape2 = ?, partidos = ?, goles = ?, asistencias = ?, faltas = ?, edad = ?";
            $params = [
                $newUsuario->usser,
                $newUsuario->email,
                $newUsuario->nombre,
                $newUsuario->ape1,
                $newUsuario->ape2,
                $newUsuario->partidos,
                $newUsuario->goles,
                $newUsuario->asistencias,
                $newUsuario->faltas,
                $newUsuario->edad
            ];
            if ($newUsuario->passwd !== null) {
                $sql .= ", passwd = ?";
                $params[] = $newUsuario->passwd;
            }
            $sql .= " WHERE id_usuario = ?";
            $params[] = $id_usuario;
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            error_log("Error al modificar usuario: " . $e->getMessage());
            return false;
        }
    }
    public function checkEmail($email): bool {
        try {
            $stmt = $this->dbh->prepare("SELECT EXISTS (SELECT 1 FROM usuarios WHERE email = ?)");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            return (bool) $stmt->fetchColumn();
        } catch (PDOException $e) {
            return false;
        }
    }

    //checkUser --> Funcion check para evitar validar usuarios con correos ya existentes
    public function checkUser($usser): bool {
        $stmt = $this->dbh->prepare(
            "SELECT usser FROM usuarios WHERE usser = ?"
        );
        $stmt->execute([$usser]);
        return $stmt->rowCount() === 1;
    }

    //evitar clonar objetos(PATRON SINGLETON)
     public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
    public function migrarContrasenas() {
        $stmtSelect = $this->dbh->prepare("SELECT email, passwd FROM usuarios");
        $stmtSelect->execute();
        $usuarios = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

        $stmtUpdate = $this->dbh->prepare("UPDATE usuarios SET passwd = :passwd WHERE email = :email");

        foreach ($usuarios as $row) {
            if (!password_get_info($row['passwd'])['algo']) {
                $hash = password_hash($row['passwd'], PASSWORD_DEFAULT);
                $stmtUpdate->execute([
                    ':passwd' => $hash,
                    ':email'     => $row['email']
                ]);
            }
        }
        echo "Contraseñas migradas correctamente";
        print_r($usuarios);
    }

}
?>