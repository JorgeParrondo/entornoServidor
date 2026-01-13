<?php
require_once 'Producto.php';
// ---------------------------------------------------------
// 2. CLASE REPOSITORIO (Maneja la lógica PDO)
// ---------------------------------------------------------
class ProductoRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // --- CREATE (Insertar) ---
    public function crear(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";
        $stmt = $this->pdo->prepare($sql);

        // Usamos bindValue porque leemos valores de las propiedades del objeto en este momento
        $stmt->bindValue(':nombre', $producto->nombre);
        $stmt->bindValue(':precio', $producto->precio);
        $stmt->bindValue(':stock',  $producto->stock);

        $stmt->execute();
        
        // Asignamos el ID generado al objeto
        $producto->id = $this->pdo->lastInsertId();
        return $producto->id;
    }

    // --- READ (Leer Todos) - Uso de FETCH_CLASS ---
    public function obtenerTodos() {
        $sql = "SELECT * FROM productos";
        $stmt = $this->pdo->query($sql);
        
        // ¡Magia! Mapeamos directamente las filas a instancias de la clase 'Producto'
        /*
        $tpro = [];
        $while ( stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto')) {
            $tpro= $pro;
        }
        return $tpro;
        */
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    // --- READ (Leer Uno) ---
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Configuramos para que el resultado sea un objeto Producto
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        return $stmt->fetch();
    }

    // --- UPDATE (Actualizar) ---
    public function actualizar(Producto $producto) {
        $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, stock = :stock WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nombre', $producto->nombre);
        $stmt->bindValue(':precio', $producto->precio);
        $stmt->bindValue(':stock',  $producto->stock);
        $stmt->bindValue(':id',     $producto->id);

        $stmt->execute();
        return $stmt->rowCount();
    }

    // --- DELETE (Eliminar) ---
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        
        // Aquí bindParam funcionaría igual, pero bindValue es más directo para valores simples
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->rowCount(); // Devuelve número de filas borradas
    }
}
?>