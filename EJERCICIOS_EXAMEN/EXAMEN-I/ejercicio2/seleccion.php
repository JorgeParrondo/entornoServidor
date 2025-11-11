<?php
session_start();

if(!isset($_SESSION['nombre'])){
    $_SESSION['nombre'] = "Parguela";
}

if(!isset($_SESSION['lenguajes'])){
    $_SESSION['lenguajes'] = [];
}

if (isset($_POST['nombre'])){
    $_SESSION['nombre'] = $_POST['nombre'];
}

if (isset($_POST['lenguajes'])){
    $_SESSION['lenguajes'] = $_POST['lenguajes'];
}

$nombre  = $_SESSION['nombre'];
$lenguajes = $_SESSION['lenguajes'];

function estalenguaje($lenguaje) : bool {
    global $lenguajes;
    return in_array($lenguaje, $lenguajes);
}

echo "<pre>";
print_r($_SESSION['lenguajes']);
echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Selección de personal</title>
</head>
<body>
<h2> Datos de candidato: Paso 2º </h2>
<form  action="seleccion.php" method="POST">
<fieldset>
<legend>Datos Profesionales </legend>
Nombre : <input type="text" name="nombre" value = "<?= $nombre ?>" >  </br>
Lenguajes de programación:<br>
<select name="lenguajes[]" multiple="multiple" size=6>
     <option value="Java" <?= estalenguaje('Java')? "selected = 'selected'" : " " ?> >Java</option>    
     <option value="Javascript"  <?= estalenguaje('Javascript')? "selected = 'selected'" : " " ?> >Javascripts</option>
     <option value="Php"  <?= estalenguaje('Php')? "selected = 'selected'" : " " ?> >Php</option>
     <option value="Python"  <?= estalenguaje('Python')? "selected = 'selected'" : " " ?> >Python</option>
     <option value="Perl"  <?= estalenguaje('Perl')? "selected = 'selected'" : " " ?> >Perl</option>
     <option value="C#"  <?= estalenguaje('C#')? "selected = 'selected'" : " " ?>>C#</option>
     </select><br>
<input type="submit" value="Enviar">
</fieldset>
</form>
</body>
</html>
