<?php
include_once 'tools.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda - Hoteles Disponibles</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            width: 90%;
            max-width: 900px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }

        .logo-img {
            width: 120px;
            height: auto;
            margin-bottom: 10px;
        }

        h1 {
            color: #1a3c5e;
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .city-badge {
            background-color: #e2e8f0;
            color: #1a3c5e;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
        }

        /* Estilos de la Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #1a3c5e;
            color: white;
            text-align: left;
            padding: 15px;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #444;
        }

        tr:hover {
            background-color: #f8faff;
        }

        .rating {
            color: #f1c40f; /* Color dorado para las estrellas */
            font-weight: bold;
        }

        .price {
            font-weight: bold;
            color: #27ae60;
        }

        .btn-book {
            background-color: #1a3c5e;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .btn-book:hover {
            background-color: #2c527a;
        }

        .back-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <img src="../logo.png" alt="Logo" class="logo-img">
        <h1>Hoteles Disponibles en <span class="city-badge" id="city-name"><?=  $ciudad ?> </span></h1>
    </header>
   <?php  
    $titulos = ["ciudad" , "nombre" , "categoria", "precio por noche", "habitaciones disponibles"];
    echo "<table>\n";
     // Identificador de la tabla
    echo "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        echo "<th>$titulos[$j]</th>";
    }  
    echo  "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    foreach ($tabla as $hotel) {
        //el primer valor de la tabla (0) es null, asi que meto este condicional para esconderlo
        //tambien lo utilizo para esconder hoteles que no tengan plazas dispobibles
        if($hotel == null || $hotel[5] == 0 ){ 
            $esconder = true;
        }else{
         echo "<tr>";
         echo "<td>$hotel[1] </td>";
         echo "<td>$hotel[2] </td>";
         echo "<td>" . verEstrellas($hotel[3]) . "</td>";
         echo "<td>$hotel[4] </td>";
         echo "<td> " . verEstado($hotel[5]) . "</td>";
         echo "</tr>\n"; 
        }
    }
    echo "</table>";
  ?>

    <a href="../index.php" class="back-link">← Volver al buscador</a>
</div>

</body>
</html>