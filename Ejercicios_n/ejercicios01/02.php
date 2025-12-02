<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.2</title>
</head>
<body>
    <?php
    
    $nLineas = random_int(1,9);
    $contador = 0;

    echo "numero de lineas : $nLineas " . "</br>" ;
  
   for ($i = 1; $i <= $nLineas; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        if ($i % 2 == 0){
         echo '<span style="color: red;">' . $i . '</span>';
        }else if ($i % 2 != 0){
         echo '<span style="color: blue;">' . $i. '</span>';
     }
   }
    echo "<br>";
}           
  
    ?>
    <hr>
    
    <?php show_source(__FILE__); ?>
</body>
</html>