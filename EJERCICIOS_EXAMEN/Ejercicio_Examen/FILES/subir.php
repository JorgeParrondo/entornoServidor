<?php
// Verificamos si se ha enviado un archivo mediante el formulario
if (isset($_FILES['archivo'])) {

    // $_FILES es un array asociativo con información del archivo subido
    // Accedemos a sus partes:

    echo "<h2>Información del archivo recibido:</h2>";

    // Nombre original del archivo (el que tenía en el ordenador del usuario)
    echo "Nombre original: " . $_FILES['archivo']['name'] . "<br>";

    // Tipo MIME (por ejemplo, image/png, text/plain, application/pdf...)
    echo "Tipo MIME: " . $_FILES['archivo']['type'] . "<br>";

    // Tamaño del archivo en bytes
    echo "Tamaño (bytes): " . $_FILES['archivo']['size'] . "<br>";

    // Nombre temporal: PHP guarda el archivo temporalmente en el servidor
    echo "Ruta temporal: " . $_FILES['archivo']['tmp_name'] . "<br>";

    // Código de error (0 significa que la subida fue exitosa)
    echo "Código de error: " . $_FILES['archivo']['error'] . "<br><br>";


    // Verificamos si la subida fue exitosa
    if ($_FILES['archivo']['error'] === UPLOAD_ERR_OK) {

        // Carpeta donde se guardarán los archivos subidos
        $carpetaDestino = "uploads/";

        // Creamos la carpeta si no existe
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }

        // Ruta final donde guardaremos el archivo
        $destino = $carpetaDestino . basename($_FILES['archivo']['name']);

        // move_uploaded_file() mueve el archivo desde la carpeta temporal
        // a la carpeta definitiva en el servidor
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $destino)) {
            echo "<p style='color:green;'>✅ Archivo subido correctamente.</p>";
            echo "<p>Guardado en: $destino</p>";
        } else {
            echo "<p style='color:red;'>❌ Error al mover el archivo al destino final.</p>";
        }

    } else {
        echo "<p style='color:red;'>❌ Error en la subida. Código: {$_FILES['archivo']['error']}</p>";
    }
} else {
    echo "No se ha recibido ningún archivo.";
}
?>
