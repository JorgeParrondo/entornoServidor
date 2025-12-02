<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.5</title>
</head>
<style>
    header{
        background-color: blue;
        text-align: center;
    }
</style>
<header>
     <h1>TABLA DE MULTIPLICAR</h1>
</header>
<body>
  <?php
  $num = random_int (min: 1, max: 10);
  ?>    
    <table border="1" align="center">
   <tr>
    <td>  <?= "tabla del $num" ?> </td>
   </tr>
   <?php
     for ($i = 0 ; $i <= 10; $i++){
        echo "<tr> <td> $num X $i </td> <td> ($num * $i) </td> </tr> " ;
     }
   ?>

    </table>
</body>
</html>