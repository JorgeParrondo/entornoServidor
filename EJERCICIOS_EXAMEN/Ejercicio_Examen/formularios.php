<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>
<body>
    <form action="subir.php" method="post" enctype="multipart/form-data">
    <label for="archivo">Selecciona un archivo:</label>
    <input type="file" name="archivo" id="archivo" required>
    <br><br>
    <button type="submit" name="enviar">Subir archivo</button>
</form>
<?php
if (isset($_FILES['archivo'])) {

    // 1️⃣ Guardamos los datos del fichero
    $nombre = $_FILES['archivo']['name'];        // Nombre original del archivo
    $tipo = $_FILES['archivo']['type'];          // Tipo MIME (image/png, text/plain, etc.)
    $tamano = $_FILES['archivo']['size'];        // Tamaño en bytes
    $temporal = $_FILES['archivo']['tmp_name'];  // Nombre temporal en el servidor
    $error = $_FILES['archivo']['error'];        // Código de error (0 si no hubo error)

    // 2️⃣ Verificamos si no hubo error al subir
    if ($error === 0) {
        // Carpeta donde guardaremos los archivos subidos
        $destino = "uploads/" . basename($nombre);

        // 3️⃣ Movemos el archivo desde la carpeta temporal a la definitiva
        if (move_uploaded_file($temporal, $destino)) {
            echo "✅ Archivo subido correctamente: $nombre<br>";
            echo "📂 Guardado en: $destino<br>";
            echo "📏 Tamaño: $tamano bytes<br>";
            echo "🧾 Tipo: $tipo<br>";
        } else {
            echo "❌ Error al mover el archivo al directorio final.";
        }
    } else {
        echo "⚠️ Error al subir el archivo (código $error)";
    }
}
?>

</body>
</html>