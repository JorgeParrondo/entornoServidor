<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title>LA FRUTERIA</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>
<div class="container">
    <div class="mensaje-principal">BIENVENIDO A NUESTRA FRUTERÍA</div>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="get">
        <label for="cliente">Introduzca su nombre de cliente:</label>
        <input name="cliente" type="text" id="cliente" placeholder="Ej: Juan Pérez" required>
        <input type="submit" value=" Empezar Compra ">
    </form>
</div>
</body>
</html>