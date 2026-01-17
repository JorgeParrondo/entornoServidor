<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../web/CSS/default.css"/>
    <link rel="stylesheet" href="../web/CSS/home.css"/>
    
</head>

<body>
    <canvas id="background"></canvas>
    
    <div id="nav">
        <div id="logo">
         <img src="../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
         <li><h2>INICIA SESIÓN PARA ACCEDER AL MENÚ</h2></li>
            <!--<li><a href="TETULEAGUE PHP/web/HTML/jugadores.html">JUGADORES</a></li>-->
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
            <!-- Copia automática para el loop -->
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
       
        <div id="navWindowUser">
            <div id="navWindowUserButton">
                <img src="../web/IMG/user.png">
                <a href="../index.php">Iniciar sesión / Registrarse</a>
            </div> 
        </div>
    </div>

    
<!-- Contenedor principal de todo el contenido de la página -->
<div id="content">

    <!-- 📰 Bloque de noticias superior -->
    <div class="bloque noticias">
        <h1>📰 Noticias</h1>
        <div class="noticias-content">
           <a href="../index.php"> <H3>BLOQUEADO PARA INVITADOS...</H3> </a>
        </div>
    </div>
     
    <!-- ====== BLOQUES INFERIORES ====== -->
    <!-- Este div agrupa las seis cajas con animaciones al pasar el ratón -->
    <div class="bloques-inferiores">
   
        <!-- Cada .bloque representa una caja -->
        <div class="bloque slide-up">
            <h1>¿Quiénes somos?</h1>
            <div class="respuesta">
                <p>TetuScores nació como un proyecto de fin de curso para la asignatura de Diseño Web en el centro Tetuán de las Victorias.</p>
            </div>
        </div>

        <div class="bloque slide-up">
            <h1>¿Qué ofrecemos?</h1>
            <div class="respuesta">
                <ul>
                    <li>Calendario de partidos actualizado.</li>
                    <li>Clasificación en tiempo real.</li>
                    <li>Información de equipos y jugadores.</li>
                    <li>Formulario de inscripción.</li>
                </ul>
            </div>
        </div>

        <div class="bloque calendario">
    <h1>Próximos partidos</h1>

    <a href="../index.php"> <H3>BLOQUEADO PARA INVITADOS...</H3> </a>
    </div>

        <div class="bloque clasificacion">
    <h1>Clasificación</h1>
    <div class="tabla-contenedor">
        <a href="../index.php"> <H3>BLOQUEADO PARA INVITADOS...</H3> </a>
    </div>
</div>

        <div class="bloque slide-up">
            <h1>¿A quién va dirigido?</h1>
            <div class="respuesta">
                <p>A estudiantes, profesores y aficionados al deporte del centro.</p>
            </div>
        </div>

        <div class="bloque slide-up">
            <h1>¿Cómo participar?</h1>
            <div class="respuesta">
                <p>Solo necesitas formar tu equipo e inscribirte en la sección correspondiente.</p>
            </div>
        </div>
    </div>
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
<script src="../web/JS/background.js" defer></script>

<style>
    h3{
        color: red;
    }
    h2{
        color: white;
    }
</style>


</html>