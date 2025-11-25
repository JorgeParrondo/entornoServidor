<?php
session_start(); 
// Inicia la sesión. Necesario para poder usar $_SESSION para guardar datos entre peticiones.

if(!isset($_SESSION['nombre'])){
    $_SESSION['nombre'] = "Parguela";
    // Si la variable de sesión 'nombre' no existe, se crea con el valor por defecto "Parguela".
}

if(!isset($_SESSION['lenguajes'])){
    $_SESSION['lenguajes'] = [];
    // Si la variable de sesión 'lenguajes' no existe, se crea como un array vacío.
}

if (isset($_POST['nombre'])){
    $_SESSION['nombre'] = $_POST['nombre'];
    // Si el formulario envía un nombre, se actualiza en la sesión.
}

if (isset($_POST['lenguajes'])){
    $_SESSION['lenguajes'] = $_POST['lenguajes'];
    // Si el formulario envía lenguajes (array), se actualizan en la sesión.
}

$nombre  = $_SESSION['nombre'];
// Copia en una variable local el nombre guardado en sesión.

$lenguajes = $_SESSION['lenguajes'];
// Copia en una variable local el array de lenguajes guardado en sesión.

function estalenguaje($lenguaje) : bool {
    global $lenguajes;
    // Permite acceder a la variable $lenguajes dentro de la función.

    return in_array($lenguaje, $lenguajes);
    // Devuelve true si ese lenguaje está marcado en el array de la sesión.
}

echo "<pre>";
print_r($_SESSION['lenguajes']);
// Muestra por pantalla el contenido actual del array de lenguajes.

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
<!-- Formulario que se envía a sí mismo (seleccion.php) usando método POST -->

<fieldset>
<legend>Datos Profesionales </legend>

Nombre : 
<input type="text" name="nombre" value = "<?= $nombre ?>" >
<!-- Input de texto que muestra el nombre actual de la sesión -->

</br>

Lenguajes de programación:<br>

<select name="lenguajes[]" multiple="multiple" size=6>
<!-- Selector múltiple; permite elegir varios lenguajes -->

     <option value="Java" <?= estalenguaje('Java')? "selected = 'selected'" : " " ?> >Java</option>    
     <!-- Marca 'Java' como seleccionado si está en la sesión -->

     <option value="Javascript"  <?= estalenguaje('Javascript')? "selected = 'selected'" : " " ?> >Javascripts</option>
     <!-- Igual con Javascript -->

     <option value="Php"  <?= estalenguaje('Php')? "selected = 'selected'" : " " ?> >Php</option>
     <!-- Igual con Php -->

     <option value="Python"  <?= estalenguaje('Python')? "selected = 'selected'" : " " ?> >Python</option>
     <!-- Igual con Python -->

     <option value="Perl"  <?= estalenguaje('Perl')? "selected = 'selected'" : " " ?> >Perl</option>
     <!-- Igual con Perl -->

     <option value="C#"  <?= estalenguaje('C#')? "selected = 'selected'" : " " ?>>C#</option>
     <!-- Igual con C# -->

</select><br>

<input type="submit" value="Enviar">
<!-- Botón de envío -->

</fieldset>
</form>

</body>
</html>
