<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2" />
    <title> EJERCICIO 1.6</title>
</head>
<style>
 #tabla1{
    background-color: red;
 }
#tabla2{
    background-color: green;
}
#tabla3{
    background-color: blue;
   
}

</style>
<body>
 <?php
  $num1 = random_int(min:100, max:500);
  $num2 = random_int(min:100, max:500);
  $num3 = random_int(min:100, max:500);
  

 ?>

<table id="tabla1" border="1">
  <tr> <td width= <?= $num1 ?> height= 40px> <?= "ROJO $num1" ?> </td> </tr>
</table>
<table id="tabla2">
  <tr> <td width= <?= $num2 ?> height= 40px> <?= "VERDE $num2" ?> </td> </tr>
</table>
<table id="tabla3">
  <tr> <td width= <?= $num3 ?> height= 40px> <?= "AZUL $num3" ?> </td> </tr>
</table>
 
</body>
</html>
