<?php
/*function verificarContrasena () : string{
     $contrasena = $_POST('contrasena');
     $verificar  = $_POST('verificar');
     if($contrasena != $verificar){
        $msg = "ERROR, las contraseñas no coinciden";
     } else{
        $msg = "Contraseña correcta";
     }
     return $msg;
    }
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 5.2</title>
</head>
<body>
    <?php  if ($_SERVER['REQUEST_METHOD'] == 'GET') :  ?>
      <form method = "post">
      Nombre: <input type = "text" name = "nombre" required>
      Apellidos: <input type = "text" name = "apellidos" required>
      Contraseña: <input type = "text" name = "contrasena" required>
      Repita su contraseña: <input type = "text" name ="verificar"  required>
      
      <input type="submit" value="ENVIAR DATOS">
      
    </form>
 <?php else :  
          
    verificarContrasena();
    ?>
    <h3><?= $msg ?></h3>
    <?php endif ?>
   
</body>
</html>


