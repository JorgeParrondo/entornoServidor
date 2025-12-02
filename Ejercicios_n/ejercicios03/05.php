<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3.5</title>
</head>
<body>
    <h1>BONOLOTO</h1>
    <?php
   $combinacion = [];
   for($i = 0; $i < 6; $i++){
    $num = random_int(min:1 , max:49);
    $combinacion[$i] = $num;
   }
  sort($combinacion);
  $num = random_int(min: 1, max: 49);
    ?>
    <table border = 1px>
        <tr>
      <?php foreach ($combinacion as $orden => $valor) : ?>
        <td> <?= $valor ?> </td>
      <?php endforeach ?>
        <td>NUMERO COMPLEMENTARIO => <?= $num ?> </td>
        </tr>
    </table>
</body>
</html>