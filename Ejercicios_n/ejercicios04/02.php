<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 4.2</title>
</head>
<body>
    <?php 
     $num1 =  0;
     $num2 = 0;
     $valores = [$num1, $num2];
     $msg = "";
     $error = false;
   
     if (!isset($_REQUEST['num1']) || !isset($_REQUEST['num2'])){
        $msg = "ERROR, introduzca ambos valores ";
        $error = true;
    }
    
      $num1 = $_GET['num1'];
      $num2 = $_GET['num2'];
      echo "Tus números son $num1 y $num2 ";
    
     function operar($num1, $num2) :int{
      $resultado = 0;
     switch ($_GET['operacion']){
      case '+':
        $resultado = $num1 + $num2; break;
      case '-':
          $resultado = $num1 - $num2; break;
      case '*':
          $resultado = $num1 * $num2; break;
      case '/':
          $resultado = $num1 / $num2; break;
     }
     return $resultado;
   }
    
    if (($num2 == 0) && ($_GET['operacion'] == '/')) {
        $error = true;
        $msg = " </BR> Error: División por cero";
    }
    if ($error == true){
        echo $msg;
     }
     if ($error == false){
         $resultado = operar($num1, $num2);
        echo "el resultado es $resultado";
     }
     ?>
</body>
</html>