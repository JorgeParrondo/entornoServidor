<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.1</title>
</head>
<body>
    <?php


    function elmayor($A, $B, $C){
    if($A > $B){
        $C = $A;
     }
    if($A < $B){
        $C = $B;
     }
    if($A == $B){
        $C = 0;
   }
   echo "El mayor es:  $C " . "<br>" ; 
}

   elmayor(1,2,5);
   elmayor(3,2,5);
   elmayor(2,2,5);   
    ?>
</body>
</html>