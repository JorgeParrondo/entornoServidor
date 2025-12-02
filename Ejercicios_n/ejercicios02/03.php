<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2.3</title>
</head>
<body>
 <?php
    require_once("funcionesref.php");
   
   $num1 = random_int(1,10);
   $num2 = random_int(1,10);
   echo "NUMERO 1 --> $num1 " . "</br>";
   echo "NUMERO 2 --> $num2 " . "</br> </br>";
   
   sumar($num1, $num2, $resultado);
   echo "suma = $resultado " . "</br>";  
   
   restar($num1, $num2, $resultado);
   echo "resta = $resultado " . "</br>";
   
   multiplicar($num1, $num2, $resultado);
   echo "multiplicacion = $resultado " . "</br>";

   dividir($num1,$num2, $resultado); 
   echo "division = $resultado " . "</br>";

   modulo($num1, $num2, $resultado);
   echo "modulo = $resultado " . "</br>";
   
   potencia($num1, $num2, $resultado);
   echo "potencia = $resultado " . "</br>";
 ?>


</body>
</html>