<?php
 if ($_SERVER ['REQUEST_METHOD'] == "GET"){
    include "captura.html";
    exit(); 
 }
$directorioSubida = "uploads/";
$imagenSubida = "";
$errorsubida = "";
 if ($_FILES['imagen']['error'] != UPLOAD_ERR_NO_FILE) {
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $rutaArchivo = $directorioSubida . $nombreArchivo;

        // Si es una imagen png y no supera el tamaño permitido
        if ($_FILES['imagen']['type'] == "image/png" && $_FILES['imagen']['size'] <=  10000) {
            // Mover la imagen subida a la carpeta de destino
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivo)) {
                $imagenSubida = $rutaArchivo;
            } else {
                $errorsubida = " No se podido copiar la imagen ";
            }
        } else {
            $errorsubida = " Fichero no es una imagen PNG o supera el máximo tamaño";
        }
    } else {
        $errorsubida = " Error al subir el fichero ".$_FILES['imagen']['error'];
    }
 } else {
    $errorsubida = " No se indicado imagen a subir ";
 }
 $nombre = $_POST['Nombre'];
 $alias = $_POST['Alias'];
 $edad = $_POST['Edad'];
 $armas = isset($_POST['armas']) ? $_POST['armas'] : [];
 $artes_magicas = ($_POST['artes_magicas']) === 'si' ? 'Sí' : 'No';

 $listadearmas = count($armas) > 0 ? implode(', ', $armas) : 'Ninguna';

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
 </head>

 <body>
 <style>
  *{
   background-color: #cbd32bff;
  }
  h1{
    text-align: center;
  }

 </style>
     
  <h1> Datos del jugador </h1>
    <strong>Nombre:</strong> <?= $nombre ?> <br> <br>
    <strong>Alias:</strong> <?= $alias ?> <br> <br>
    <strong>Armas seleccionadas: </strong> <?= $listadearmas ?> <br><br>
    <strong>¿Practica magia?  </strong> <?= $artes_magicas ?> 
    <?php if ($imagenSubida): ?>
                    <p><strong>Imagen subida:</strong></p>
                    <img src="<?= $imagenSubida; ?>" alt="Imagen del jugador">
                <?php else: ?>
                    <p><strong>No se subió ninguna imagen.</strong></p>
                    <img src="calavera.png" alt="Imagen del jugador">
                    <p>
                        <?= $errorsubida ?>
                    </p>
   <?php endif; ?>
 </body>
 </html>