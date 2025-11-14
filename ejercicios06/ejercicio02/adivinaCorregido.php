<?php
session_start();

if (!isset($_SESSION['numeroOculto'])) {
    $_SESSION['numeroOculto'] = random_int(1, 20);
    $_SESSION['intentos'] = 0;
}

$msg = "";
$NumJugador = $_REQUEST['numeroJugador'] ?? null;

if (isset($NumJugador)) {

    if ($NumJugador == $_SESSION['numeroOculto']) {
        $msg = "Has acertado";
        session_destroy(); 
    } 
    else {
        $_SESSION['intentos']++;

        if ($_SESSION['intentos'] >= 5) {
            $msg = "Has perdido. El número era ".$_SESSION['numeroOculto'].".";
            session_destroy();
        } 
        else {
            $restantes = 5 - $_SESSION['intentos'];
            $msg = "Has fallado, te quedan $restantes intentos.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') :
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 6.2</title>
</head>
<body>
    <h2>Hora de adivinar</h2>
    <form method="post">
        Introduce un número del 1 al 20:
        <input type="number" name="numeroJugador" required>
        <input type="submit" value="ADIVINAR">
    </form>
</body>
</html>

<?php else : ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 6.2</title>
</head>
<body>
    <h2><?= $msg ?></h2>
</body>
</html>

<?php endif ?>
