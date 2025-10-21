<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2.5</title>
</head>
<body>
    <table border = "$borde">

    </table>
    <?php
    function generarHTMLTable ( $filas, $columnas, $borde,$contenido){
    echo "<table style=\" border:$borde px solid black; border-collapse:collapse; \">";
    for ($i = 0; $i < $filas; $i ++) {
        echo "<tr  style='border:$borde' px solid black; border-collapse:collapse; \">";
        for ($j = 0; $j < $columnas; $j ++) {
            echo "<td style=\" border:$borde". "px solid black; border-collapse:collapse; \"> $contenido </td>";
        }
        echo "</tr>";   //No se cierra tr hasta ahora porq sino no caben las td
    }
    echo "</table>";
}
 generarHTMLTable (4,4,1,"PHP");

    ?>
</body>
</html>