<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3.3</title>
</head>
<body>
    <?php
    $Periodicos = [
        "El Pais" => "https://www.elpais.com",  
        "El Mundo" => "https://www.elmundo.es",
        "Marca" => "https://www.marca.com",
        "Antena3" => "https://www.antena3.com",
        "La Razón" => "https://www.larazon.es"
    ];

    $rand = array_rand($Periodicos);
    ?>
    <p>El medio elegido es <a href="<?= $Periodicos[$rand] ?>"><?= $rand ?></a></p>
</body>
</html>
