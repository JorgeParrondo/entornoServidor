<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Hoteles Exclusivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 50px;
            background-color: #f4f4f9;
        }
        .form-container {
            background: white;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
        }
        /* Estilo para el logo */
        .logo-img {
            width: 320px; /* Tamaño ajustado para que se vea bien en la caja */
            height: auto;
            margin-bottom: 5px;
            border-radius: 5px;
        }
        h2 {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .input-group {
            margin-bottom: 25px;
            text-align: left;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        button {
            background-color: #1a3c5e; /* Un color azul más oscuro para combinar con el logo premium */
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2c527a;
        }
    </style>
</head>
<body>

<div class="form-container">
    <img src="logo.png" alt="Logo Viajes Exclusivos" class="logo-img">
    
    <h2>¿A QUÉ CIUDAD DESEA VIAJAR?</h2>
    
    <form action="app/buscarHotel.php" method="GET">
        <div class="input-group">
            <label for="ciudad">CIUDAD:</label>
            <input type="text" id="ciudad" name="ciudad" value= "$_SESSION['ciudad']" placeholder="Escriba el destino..." required> 
        </div>
        
        <button type="submit">Buscar Hotel</button>
    </form>
</div>

</body>
</html>