<?php
session_start();
$numero = $_POST['numero'];

if($numero == $_SESSION['numeroAdivina']){
    echo "Has ganado";
    session_unset();
    session_destroy();
    exit();
  
}else{
    echo "Has fallado";
    $_SESSION['fallos'] = $_SESSION['fallos'] + 1;
    exit();
}
    
   header("Location: index.php");
   header("Refresh:2");
?>

