<!--<//?php header("Location: web/HTML/home.php"); ?> -->
<?
//se destruye la sesion porque si se pulsa el boton de home volveria a este formularios sin cerrar la sesion.
session_unset();
session_destroy();
include_once('app/funciones.php');
include_once('app/config.php');
include_once('dat/cifrarContrasena.php');
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="web/CSS/default.css" />
    <link rel="stylesheet" href="web/CSS/inscribete.css" />
</head>
<script src="web/JS/background.js" defer></script>
<body>
    <canvas id="background"></canvas>

<div id="nav">
    <div id="logo">
        <a href="../index.php"><img src="web/IMG/Logo1.png" alt="Logo" width="200px"></a>
    </div>
    <ul id="nav-list">
       <H1>COMPLETA EL FORMULARIO PARA ACCEDER A LA WEB </H1>
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

<div id="content">
    <div class="container" id="container">
        
        <div class="form-container sign-up-container">
            <form method="post" action="app/controlAcceso.php">
                <h1 style="color:black">Crea una cuenta</h1>
                <span> </span>
                <input type="hidden" name="action" value="register">
                <input type="text" name="usserRegistro" placeholder="Usuario" />
                <input type="email" name="emailRegistro" placeholder="Email" />
                <input type="password" name="passwordRegistro" placeholder="Password" />
                <input type="submit" id="botones" value="REGISTRARSE">
            </form>  
           
            </div>
        <div class="form-container sign-in-container">
            <form method="post" action="app/controlAcceso.php">
              
                <h1 style="color:black">Inicia sesión</h1>
                <span> </span>
                <input type="hidden" name="action" value="login">
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" id="botones" value="INICIAR SESIÓN">
                <a href="layouts/homeInvitado.php">ENTRAR COMO INVITADO</a>
            </form>
            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>¡Bienvenido de nuevo!</h1><br>
                    <p>Para seguir conectado inicia sesión con nosotros</p> <br>
                    <button class="ghost" id="signIn">Inciar sesión</button>
                    
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>¡Hola, amigo!</h1> <br>
                      <p>Completa tus datos para empezar la aventura</p> <br>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
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
 <script src="web/JS/inscribete.js"></script>
</body>
</html>
<style>
    h1{
        color:white;
    } 
</style>