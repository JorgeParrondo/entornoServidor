<?php
// ================================================================
// 1️⃣ COMPROBAR EL MÉTODO DE ACCESO (GET o POST)
// ================================================================
// Si el usuario entra por primera vez (GET), se muestra el formulario (captura.html)
// Si ya ha enviado el formulario (POST), se procesan los datos
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include  "captura.html"; // Muestra el formulario HTML
    exit();                  // Termina el script (no ejecuta el resto)
}

// ================================================================
// 2️⃣ CONFIGURACIÓN PARA SUBIDA DE IMÁGENES
// ================================================================
$directorioSubida = "uploads/"; // Carpeta donde se guardarán las imágenes
$imagenSubida = "";             // Variable que almacenará la ruta final de la imagen subida
$errorsubida = "";              // Variable para guardar mensajes de error

// ================================================================
// 3️⃣ PROCESAR LA SUBIDA DE IMAGEN (si el usuario seleccionó un archivo)
// ================================================================

// Si NO se ha seleccionado ningún fichero, PHP pone el código de error UPLOAD_ERR_NO_FILE
if ($_FILES['imagen']['error'] != UPLOAD_ERR_NO_FILE) {

    // Si no hubo error en la subida (UPLOAD_ERR_OK == 0)
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        
        // Se obtiene el nombre del archivo y la ruta destino final
        $nombreArchivo = basename($_FILES["imagen"]["name"]);   // Nombre original del archivo
        $rutaArchivo = $directorioSubida . $nombreArchivo;      // Carpeta destino + nombre del archivo

        // ========================================================
        // Verificación del tipo y tamaño del archivo
        // Solo se aceptan imágenes PNG y tamaño máximo 10.000 bytes (10 KB)
        // ========================================================
        if ($_FILES['imagen']['type'] == "image/png" && $_FILES['imagen']['size'] <=  10000) {
            
            // Mover el archivo desde la carpeta temporal al directorio de destino
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivo)) {
                // Si se movió correctamente, guardamos la ruta en $imagenSubida
                $imagenSubida = $rutaArchivo;
            } else {
                // Si hubo error al moverlo
                $errorsubida = " No se podido copiar la imagen ";
            }
        } else {
            // Si el archivo no es PNG o supera el tamaño máximo permitido
            $errorsubida = " Fichero no es una imagen PNG o supera el máximo tamaño";
        }

    } else {
        // Si hubo un error durante la subida (por ejemplo, error de permisos, tamaño, etc.)
        $errorsubida = " Error al subir el fichero " . $_FILES['imagen']['error'];
    }

} else {
    // Si el usuario no seleccionó ningún archivo
    $errorsubida = " No se indicó imagen a subir ";
}


// ================================================================
// 4️⃣ RECOGER LOS DATOS DEL FORMULARIO
// ================================================================

// Se usa htmlspecialchars() para evitar ataques XSS (inserción de código malicioso)
$nombre = htmlspecialchars($_POST['nombre']);
$alias = htmlspecialchars($_POST['alias']);
$edad = htmlspecialchars($_POST['edad']);

// Si se seleccionaron armas (checkboxes), se guardan en un array. Si no, array vacío.
$armas = isset($_POST['armas']) ? $_POST['armas'] : [];

// Convertimos el valor de 'artes_magicas' a texto “Sí” o “No”
$artes_magicas = htmlspecialchars($_POST['artes_magicas']) === 'si' ? 'Sí' : 'No';

// Si hay armas, las unimos en una cadena separada por comas. Si no, ponemos “Ninguna”.
$listadearm
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Jugador</title>

    <style>
        /* Estilos básicos */
        body {
            background-color: #9a9ab4;
            padding: 20px;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        /* La tabla amarilla que muestra los datos */
        table {
            background-color: yellow;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        h2 { text-align: center; }

        /* Imagen del jugador */
        img {
            width: 100px;
            border: 2px solid;
            border-color: black;            
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Datos del Jugador</h2>
        <table>
            <tr>
                <td>
                    <!-- Se muestran los datos recogidos del formulario -->
                    <p><strong>Nombre:</strong> <?= $nombre ?></p>
                    <p><strong>Alias:</strong> <?= $alias ?></p>
                    <p><strong>Edad:</strong> <?= $edad ?></p>
                    <p><strong>Armas seleccionadas:</strong> <?= $listadearmas ?></p>
                    <p><strong>¿Practica artes mágicas?:</strong> <?= $artes_magicas ?></p>
                </td>

                <td>
                    <!-- Mostrar la imagen subida o una de sustitución -->
                    <?php if ($imagenSubida): ?>
                        <p><strong>Imagen subida:</strong></p>
                        <img src="<?= $imagenSubida; ?>" alt="Imagen del jugador">
                    <?php else: ?>
                        <p><strong>No se subió ninguna imagen.</strong></p>
                        <img src="calavera.png" alt="Imagen por defecto">
                        <p><?= $errorsubida ?></p>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
