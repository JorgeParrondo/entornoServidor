<?php
session_start();
include_once ('../dat/AccesoDatos.php');
include_once ('../app/funciones.php');
//control de sesion
controlInteraccion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../web/CSS/default.css"/>
    <link rel="stylesheet" href="../web/CSS/perfil.css"/>
</head>
<script src="../web/JS/background.js" defer></script>
<body>
    <canvas id="background"></canvas>
    <div id="nav">
        <div id="logo">
            <a href="home.php"><img src="../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="calendario.php" class="active">CALENDARIO</a></li>
            <li><a href="equipos.php">EQUIPOS</a></li>
            <li><a href="clasificacion.php">CLASIFICACIÓN</a></li>
            <li><a href="perfil.php">PERFIL</a></li>
        </ul>
    </div>
    <div class="ticker-s24">
        <div class="ticker__wrap">
            <ul class="ticker__list">
                <li class="ticker__item">Últimos resultados actualizados</li>
                <li class="ticker__item">Nuevos partidos añadidos a Tetuscores</li>
                <li class="ticker__item">Estadísticas en tiempo real disponibles</li>
                <li class="ticker__item">Consulta rankings y clasificaciones</li>
                <li class="ticker__item">Notificaciones de goles al instante</li>
                <li class="ticker__item">Sigue tus equipos favoritos</li>
                <li class="ticker__item">Tetuscores – Datos precisos y al momento</li>
                <li class="ticker__item">Nuevas funciones disponibles en la app</li>
                <li class="ticker__item">Calendario de próximos partidos</li>
                <li class="ticker__item">Estadísticas de jugadores actualizadas</li>
            </ul>
            <ul class="ticker__list">
                <li class="ticker__item">   </li>
                <li class="ticker__item">Nuevos partidos añadidos a Tetuscores</li>
                <li class="ticker__item">Estadísticas en tiempo real disponibles</li>
                <li class="ticker__item">Consulta rankings y clasificaciones</li>
                <li class="ticker__item">Notificaciones de goles al instante</li>
                <li class="ticker__item">Sigue tus equipos favoritos</li>
                <li class="ticker__item">Tetuscores – Datos precisos y al momento</li>
                <li class="ticker__item">Nuevas funciones disponibles en la app</li>
                <li class="ticker__item">Calendario de próximos partidos</li>
                <li class="ticker__item">Estadísticas de jugadores actualizadas</li>
            </ul>
        </div>
    </div>
    <div id="navWindow">
        <div id="navWindowPath">
            <a href="../home.php">Home</a> &gt; <a href="perfil.php">Perfil</a>
        </div>
        <div id="navWindowUser">
            <div id="navWindowUserButton">
                <img src="../web/IMG/user.png">
                <a href="../app/logout.php">Cerrar la sesion</a>
            </div> 
        </div>
    </div>
</div>
<div id="content">
    <h1>Perfil de jugador:</h1>
    <?php echo verPerfil(); ?>
</div>
<div id="footer">
    <div class="footer-content">
        <p>Contacto: <a href="mailto:jorgeparron2@gmail.com">jorgeparron2@gmail.com</a></p>
        <p>Teléfono: <a href="tel:+34644736788">+34 644 73 67 88</a></p>
        <p>Dirección: Calle Vía Límite, 14, 28029 Madrid, España</p>
    </div>
    <div class="footer-copy">
        <p>© 2025 TetuScores. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
