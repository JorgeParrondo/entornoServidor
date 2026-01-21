<?php
session_start();
if(!isset($_SESSION['numeroAdivina']) || !isset($_SESSION['fallos'])){
   $_SESSION['numeroAdivina'] = random_int(1,20);
   $_SESSION['fallos'] = 0;
}
if($_SESSION['fallos'] >= 5){
    setcookie("bloqueaominegro","1",time() + 10);
}
if(isset($_COOKIE['bloqueaominegro'])){
    echo "bloqueao 10 segunditos mi negro";
    session_unset();
    session_destroy();
}
echo $_SESSION['numeroAdivina'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>fallos <?= $_SESSION['fallos'] ?></h3>
    <form method = "post" action="adivina.php">
        mete numero : <input type="number" name="numero">
        envia: <input type="submit" value="envia numero">
    </form>  
</body>
</html>