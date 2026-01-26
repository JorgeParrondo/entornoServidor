<?php
session_start();
//si alguien entra directamente al enlace le devuelve a index
if(!isset($_SESSION['administrador'])){
    session_unset();
    session_destroy();
    header("Location: /php/DisenoWEB-main/index.php");
    exit();
}
//control de sesion
include_once ('../../app/funciones.php');
controlInteraccion();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../../web/CSS/default.css"/>
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="../../index.php"><img src="../../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="admLiga.html">Liga</a></li>
            <li><a href="admNoticias.php">Noticias</a></li>
            <li><a href="admUsuarios.php">Usuarios</a></li>
        </ul>
    </div>

<!-- Contenedor principal de todo el contenido de la página -->
    <div id="content">
        <h1>Panel de Administrador</h1>
        <p>Bienvenido al panel de administración. Aquí puedes gestionar usuarios, noticias y la liga.</p>
        <a href="../../app/logout.php">Cerrar la sesión</a>
    </div>
</body>
</html>