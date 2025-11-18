<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minicasino</title>
</head>
<body>
    <h1>BIENVENIDO AL MINICASINO!!</h1>
    <H3>Esta es su visita número <?= $_SESSION['visitas'] ?> </H3>
    <form action="index.php" method = 'post'>
        Introduzca la cantidad de dinero a utilizar en el casino: <input type="number" name="dinero" min = "1" required >
        <input type="submit" value="ENTRAR AL CASINO">
    </form>
</body>
</html>