<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Puntos</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; }
        .box { border: 2px solid #6c5ce7; display: inline-block; padding: 20px; border-radius: 10px; }
       button { background: #6c5ce7; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Bienvenido, <?= $_SESSION['dni'] ?></h1>
        <p>Tienes <strong> <?= $_SESSION['puntos'] ?> </strong> puntos acumulados.</p> 
        <?php if ($_SESSION['puntos'] > 0 ) : ?>
        <button onclick="window.location.href='index.php?orden=continuar'">Apostar</button>
        <?php else :?>
         <p> No tiene puntos para apostar</p>
        <?php endif ?>
        <p></p>
        <button onclick="window.location.href='index.php?orden=salir'">Salir</button>
        
    </div>
</body>
</html>