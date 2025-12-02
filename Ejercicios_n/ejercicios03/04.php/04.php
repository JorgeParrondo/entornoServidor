<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3.4</title>
</head>
<body>
    <style>
        img{
            height : 100px;
            width : 100 px;
        }
    </style>
 <?php 

 $deportes =[
    "Futbol" => "futbol.png",
    "Basket" => "basket.png",
    "Boxeo" => "boxeo.png",
    "Ajedrez" => "ajedrez.png",
    "Si" => "si.png" 
    ]
?>


    <table border = 1 >

    <?php foreach ($deportes as $clave => $foto) : ?>
    <tr>
    <td> <?= $clave ?>  </td>
    <td><img src= "<?= $foto ?>" >  </td>
    </tr>
    <?php endforeach ?>
    </table>
</body>
</html>