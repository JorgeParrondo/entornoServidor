<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3.1</title>
</head>
<body>
   <?php
   $miArray = []; 
   $num = random_int(min:1 , max: 10);
   $maximo = 0;
   $minimo = 9999;
   $suma = 0;
   for($i = 0; $i < 20 ; $i++){
      $num = random_int(min:1 , max: 10);
      $miArray[$i] = $num;
      if ($num > $maximo){
        $maximo = $num;
      }
     if ($num < $minimo){
        $minimo = $num;
      }
      $suma = $suma + $num;
   }

   $media = $suma / 20;
   print_r($miArray);
   echo "</br> El maximo es $maximo </br>";
   echo "El minimo es $minimo </br>";
   echo "La media es $media </br>";
   ?>
</body>
</html>