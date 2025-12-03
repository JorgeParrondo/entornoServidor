<?php
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
        return  $stmt->rowCount(); //devuelve el numero de filas actualizadas
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

// ---------------------------------------------------------
// 3. EJEMPLO DE USO (Script Principal)
// ---------------------------------------------------------

// Configuración de conexión
$dsn = 'mysql:host=localhost;dbname=tienda_demo;charset=utf8mb4';
$user = 'root'; // Cambia esto
$pass = '';     // Cambia esto

try {
    // A. Conexión
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Instanciamos el repositorio
    $repo = new ProductoRepository($pdo);

    echo "<h2>--- Inicio del CRUD ---</h2>";

    // 1. CREATE: Crear un nuevo producto
    $nuevoProd = new Producto();
    $nuevoProd->nombre = "Teclado Mecánico";
    $nuevoProd->precio = 59.99;
    $nuevoProd->stock = 10;

    $idGenerado = $repo->crear($nuevoProd);
    echo "✅ Producto creado: " . $nuevoProd->info() . "<br>";

    // 2. READ: Listar todos
    echo "<br><strong>Lista de productos:</strong><br>";
    $lista = $repo->obtenerTodos();
    foreach ($lista as $p) {
        echo "- " . $p->info() . "<br>";
    }

    // 3. UPDATE: Modificar el producto creado
    // Primero lo recuperamos por ID para asegurarnos que tenemos el objeto correcto
    $prodParaEditar = $repo->obtenerPorId($idGenerado);
    
    if ($prodParaEditar) {
        $prodParaEditar->precio = 45.00; // Bajamos el precio
        $prodParaEditar->stock  = 9;     // Vendimos uno
        
        $repo->actualizar($prodParaEditar);
        echo "<br>🔄 Producto actualizado (Nuevo precio: 45.00$).<br>";
    }

    // 4. READ (Verificación): Vemos el cambio
    $prodVerificado = $repo->obtenerPorId($idGenerado);
    echo "Verificación: " . $prodVerificado->info() . "<br>";

    // 5. DELETE: Borrar el producto
    $filas = $repo->eliminar($idGenerado);
    if ($filas > 0) {
        echo "<br>🗑️ Producto eliminado correctamente.";
    }

} catch (PDOException $e) {
    echo "Error Grave: " . $e->getMessage();
}

// Desconexión (Opcional, PHP lo hace al final del script)
$pdo = null;
?>
