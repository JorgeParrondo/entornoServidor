<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2.6</title>
</head>
<body>
    <?php
    $cantidad = random_int(min:1 , max:10);
    echo "cantidad = $cantidad </br>";  
    for($j = 0; $j < 2 ; $j++){

     for($i = 0; $i < $cantidad ; $i ++){
      echo "**** ";
    }
    echo "</br>";
   }
    
    ?>
</body>
</html>