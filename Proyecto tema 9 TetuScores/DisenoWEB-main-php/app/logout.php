<?php
//Cuando un usuario cierre la sesion se le redirige aqui y luego a index
session_start();        
session_unset();
session_destroy();

header("Location: /php/DisenoWEB-main/index.php");
exit();

?>