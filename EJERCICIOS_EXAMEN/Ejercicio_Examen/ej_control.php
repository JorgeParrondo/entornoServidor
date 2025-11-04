<?php
session_start();

/* ==============================
   FUNCIONES AUXILIARES
================================ */

// Elige una palabra secreta al azar
function elegirPalabra() {
    static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
    return strtoupper($tpalabras[array_rand($tpalabras)]);
}

// Comprueba si una letra está en la cadena
function comprobarLetra($letra, $cadena) {
    return (strpos($cadena, $letra) !== false);
}

/*
 * Devuelve una cadena donde aparecen las letras acertadas y el resto se reemplaza por '-'
 */
function generaPalabraconHuecos($cadenaletras, $cadenapalabra) {
    $resu = "";
    for ($i = 0; $i < strlen($cadenapalabra); $i++) {
        $letra = $cadenapalabra[$i];
        if (comprobarLetra($letra, $cadenaletras)) {
            $resu .= $letra;
        } else {
            $resu .= "-";
        }
    }
    return $resu;
}

/* ==============================
   INICIO DEL JUEGO
================================ */

// Si no hay palabra en la sesión, iniciar una nueva partida
if (!isset($_SESSION['palabrasecreta'])) {
    $_SESSION['palabrasecreta'] = elegirPalabra();
    $_SESSION['letrasusuario'] = "";
    $_SESSION['fallos'] = 0;
}

// Inicializar o leer cookie de partidas ganadas
if (!isset($_COOKIE['partidas'])) {
    $partidasGanadas = 0;
} else {
    $partidasGanadas = $_COOKIE['partidas'];
}

/* ==============================
   PROCESAR LETRA INTRODUCIDA
================================ */
$mensaje = "";
if (isset($_POST['letra'])) {
    $letra = strtoupper($_POST['letra']);

    // Evitar repetir letras
    if (comprobarLetra($letra, $_SESSION['letrasusuario'])) {
        $mensaje = "Ya habías probado la letra '$letra'.";
    } else {
        $_SESSION['letrasusuario'] .= $letra;
        if (comprobarLetra($letra, $_SESSION['palabrasecreta'])) {
            $mensaje = "¡Bien! La letra '$letra' está en la palabra.";
        } else {
            $_SESSION['fallos']++;
            $mensaje = "Fallaste, la letra '$letra' no está.";
        }
    }
}

/* ==============================
   ESTADO DEL JUEGO
================================ */
$palabraConHuecos = generaPalabraconHuecos($_SESSION['letrasusuario'], $_SESSION['palabrasecreta']);
$palabraCompleta = $_SESSION['palabrasecreta'];
$fallos = $_SESSION['fallos'];

$ganado = ($palabraConHuecos == $palabraCompleta);
$perdido = ($fallos > 5);

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Juego de la Palabra Oculta</title>
<style>
    body { font-family: Arial; background: #f9f9f9; text-align: center; margin-top: 50px; }
    h1 { color: #333; }
    .palabra { font-size: 32px; letter-spacing: 8px; margin: 20px; }
    .mensaje { color: blue; margin: 10px; }
    .error { color: red; }
    form { margin-top: 20px; }
</style>
</head>
<body>

<h1>PALABRA OCULTA</h1>

<p>Nueva partida, llevas ganadas <?= $partidasGanadas ?> partidas.</p>

<p class="palabra"><?= $palabraConHuecos ?></p>
<p>Fallos: <?= $fallos ?> / 5</p>
<p>Letras usadas: <?= $_SESSION['letrasusuario'] ?></p>
<p class="mensaje"><?= $mensaje ?></p>

<?php if ($ganado): ?>
    <h2>🎉 ¡Enhorabuena, has ganado! 🎉</h2>
    <?php 
        $partidasGanadas++;
        setcookie("partidas", $partidasGanadas, time() + (14*24*60*60)); // 2 semanas
        session_destroy();
    ?>
    <p>Ya son <?= $partidasGanadas ?> partidas ganadas.</p>
    <form method="post"><button type="submit">Jugar de nuevo</button></form>

<?php elseif ($perdido): ?>
    <h2 class="error">😢 Has perdido. La palabra era: <?= $palabraCompleta ?></h2>
    <?php 
        session_destroy();
    ?>
    <form method="post"><button type="submit">Intentar otra vez</button></form>

<?php else: ?>
    <form method="post" action="">
        <label>Introduce una letra:</label>
        <input type="text" name="letra" maxlength="1" required autofocus>
        <button type="submit">Probar</button>
    </form>
<?php endif; ?>

</body>
</html>
