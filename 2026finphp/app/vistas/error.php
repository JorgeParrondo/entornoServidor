<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sin Disponibilidad - Viajes Exclusivos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        .logo-img {
            width: 330px;
            height: auto;
            margin-bottom: 20px;
        }

        .icon-no-results {
            font-size: 50px;
            color: #ccc;
            margin-bottom: 20px;
        }

        h1 {
            color: #1a3c5e;
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .city-name {
            font-weight: bold;
            color: #333;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-primary {
            background-color: #1a3c5e;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2c527a;
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid #1a3c5e;
            color: #1a3c5e;
        }

        .btn-outline:hover {
            background-color: #f0f4f8;
        }

        .support-text {
            margin-top: 25px;
            font-size: 0.85rem;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <img src="../logo.png" alt="Logo" class="logo-img">
    
    <div class="icon-no-results">📍 </div>
    
    <h1>Sin disponibilidad en <span class="city-name"></B><?=  $ciudad ?></B></span></h1>
     
    <p> <B> <?php $msg ?> </B></p>
    <div class="button-group">
        <a href="../index.php" class="btn btn-primary">INTENTAR OTRA CIUDAD</a>
    </div>

    
</div>

</body>
</html>