<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.4</title>
</head>
<body>
  <?php
   $maximo = -1;
   $minimo = 9999;
   $media = 0;
   $suma = 0;
   $num = 1;
  for($i = 1; $i <= 50 ; $i++){
  $num = random_int (min: 1, max: 100);
   if ($num > $maximo){
      $maximo = $num;
    }else if($num < $minimo){
      $minimo = $num;
    }
   $suma = $suma + $num;
  }
   $media = $suma / 50;
   

    ?>







    <table border = 1>
        <tr>
            <th colspan="2" style="text-align:center;">50 Números generados</th>
        </tr>
        <tr>
            <td>Máximo </td>
            <td><?= $maximo ?></td>
        </tr>
        <tr>
            <td>minimo</td>
            <td><?= $minimo ?></td>
        </tr>
        <tr>
            <td>media</td>
            <td><?= $media ?></td>
        </tr>
    </table>
    

   
</body>
</html>