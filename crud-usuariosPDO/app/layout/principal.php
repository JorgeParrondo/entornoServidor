<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CRUD DE USUARIOS</title>
<link href="web/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="web/js/funciones.js"></script>
</head>
<body>
<div id="container" >
<div id="header">
<h1>GESTIÓN DE USUARIOS versión 1.1 + BD</h1>
</div>
<div id="content">
<form method="GET">

    <?= $contenido ?>

    <button type="submit" name="orden" value="Nuevo">Nuevo</button>

    <button type="submit" name="orden" value="Terminar">Terminar</button>

    <input type="submit" name="orden" value="Incrementar Saldo">

    <button type="submit" name="orden" value="Cambiar bloqueo">
        Cambiar bloqueo
    </button>

</form>

</div>
</div>
</body>
