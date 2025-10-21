<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.4</title>
</head>
<body>
    <?php
    $n1 = random_int(min: 1, max:10);
    $n2 = random_int(min: 1, max:10);
    echo "Numero 1 --> " . $n1 . " Numero 2 --> "  . $n2 . "</br>" . "</br>" ;
   
    ?>
    <table border="1">
  <tr>
        <td>Operación</td>
        <td>Resultado</td>
  </tr>
  <tr>
    <td> <?= " $n1  +  $n2" ?> </td>
    <td> <?= $n1 + $n2 ?> </td>
  </tr>

  <tr>
    <td> <?= " $n1  -  $n2" ?> </td>
    <td> <?= $n1 - $n2 ?> </td>
  </tr>

  <tr>
    <td> <?= " $n1  *  $n2" ?> </td>
    <td> <?= $n1 * $n2 ?> </td>
  </tr>

  <tr>
    <td> <?= " $n1  /  $n2" ?> </td>
    <td> <?= $n1 / $n2 ?> </td>
  </tr>

  <tr>
    <td> <?= " $n1  e  $n2" ?> </td>
    <td> <?= $n1 ** $n2 ?> </td>
  </tr>
    
    
   </table>
</body>
</html>