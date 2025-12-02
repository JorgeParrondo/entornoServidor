<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 5.1</title>
</head>
<body>

<h1>Calculador de letra de DNI</h1>

<?php
$letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];

if ($_SERVER['REQUEST_METHOD'] == 'GET') : ?>

    <form method="post">
        Número del DNI: <input type="text" name="dni">
        <input type="submit" value="Calcular letra">
    </form>

<?php  else:
    $numerodni = $_POST['dni'];
    $error = false;
    $msg = "";

    
    if ( !ctype_digit($numerodni) || strlen($numerodni) != 8) {
        $error = true;
        $msg = " ERROR: El DNI debe tener exactamente 8 números.";
    }

    if ($error) {
        echo $msg;
    } else {
        
        $letradni = $letras[$numerodni % 23];
        echo "<p>Número: <strong>$numerodni</strong></p>";
        echo "<p>Letra: <strong>$letradni</strong></p>";
    }
  endif;
?>

</body>
</html>
