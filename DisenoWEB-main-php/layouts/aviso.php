<!--Obtiene del formulario el nombre y el mail del equipo y confirma que el formulario se ha rellenado correctamente -->
<?php
$equipo = $_POST['nombre_equipo'];
$email = $_POST['correo_contacto'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../web/CSS/default.css" />
    <link rel="stylesheet" href="../web/CSS/inscribete.css" />
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="../index.php"><img src="../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="calendario.html">CALENDARIO</a></li>
            <li><a href="equipos.html">EQUIPOS</a></li>
            <li><a href="clasificacion.html">CLASIFICACIÓN</a></li>
            <li><a href="inscribete.html">INSCRÍBETE</a></li>
        </ul>
    </div> 
   
    <main>
        <h2>Registrado</h2>
        <p>
            Tu equipo <strong><?= htmlspecialchars($equipo) ?></strong> y tu gmail <strong><?= htmlspecialchars($email) ?></strong> 
            han sido enviados al administrador de la liga.<br>
            Pronto se te contactará para la información de tu equipo.
        </p>
        <a href="../index.html">Volver al menú principal</a>
    </main>

    <div id="footer">
        <p>Contacto: <a href="mailto:tetuanLeague@gmail.com">tetuanLeague@gmail.com</a></p>
        <p>Teléfono: +34 644 73 67 88</p>
        <p>Dirección: Calle Fantasía 12, Madrid, España</p>
    </div>
</body>
</html>

<style>
#content {
    display: flex;
    justify-content: center;  
    align-items: center;               
    padding: 40px;
}

#registro {
    background-color: white;
    border-radius: 15px;
    padding: 50px;
    height: 480px;             
    max-width: 700px;        
}

#registro form {
    display: flex;
    flex-direction: column;
    gap: 3px;               
}

#content div {
    background-color: white;
    border-radius: 15px;
}

#formulario {
    flex: 1;
    margin-right: 20px;
    height: 70px;
}
</style>