<?php
include_once('AccesoDatos.php');
include_once('Producto.php');

function envioBloqueado(): bool {
    return isset($_COOKIE['enviado']);
}


if (envioBloqueado()) {
    echo "Ya se ha enviado el formulario en menos de 24 horas. Acceso bloqueado.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    setcookie("enviado", "1", time() + 84600);

    $tproductos = $_POST['tproductos'];

    $ac = AccesoDatos::getModelo();
    $ac->descontarProductos($tproductos);
    $tproductos = $ac->seleccionarProductos();
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $ac = AccesoDatos::getModelo();
    $tproductos = $ac->seleccionarProductos();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>

<form method="post">

<table border="2">
    <tr>
        <td></td>
        <td>Producto</td>
        <td>Descripción</td>
        <td>Stock</td>
        <td>Precio</td>
    </tr>

<?php foreach ($tproductos as $pro): ?>
    <tr>
        <td>
            <input type="checkbox" name="tproductos[]" value="<?= $pro->producto_no ?>">
        </td>
        <td><?= $pro->producto_no ?></td>
        <td><?= $pro->descripcion ?></td>
        <td><?= $pro->stock_disponible ?></td>
        <td><?= $pro->precio_actual ?></td>
    </tr>
<?php endforeach; ?>

</table>

<input type="submit" value="ACTUALIZAR">
</form>

</body>
</html>
