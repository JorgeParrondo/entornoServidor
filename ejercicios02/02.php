<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2.2</title>
</head>
<body>
    <?php 

   require_once('funcionesvar.php');
   $num1 = random_int(1,10);
   $num2 = random_int(1,10);
   
   echo "NUMERO 1 --> $num1 " . "</br>";
   echo "NUMERO 2 --> $num2 " . "</br>";

    echo "suma " . sumar($num1, $num2) ."</br>";  

   echo "resta " . restar($num1, $num2) ."</br>";

   echo "multiplicacion " . multiplicar($num1, $num2) ."</br>";

   echo "division " . dividir($num1,$num2) ."</br>";

   echo "modulo " . modulo($num1, $num2) ."</br>";

   echo "potencia " . potencia($num1, $num2) ."</br>";
?>

</body>
</html>