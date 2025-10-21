<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjercicioDado</title>
</head>
<body>
    <h1>EL JUEGO DE LOS DADOS</h1>
    <?php 
      define ('DADO1' , '&#9856');
      define ('DADO2' , '&#9857');  
      define ('DADO3' , '&#9858');
      define ('DADO4' , '&#9859');
      define ('DADO5' , '&#9860');
      define ('DADO6' , '&#9861');
    //hola
     function jugada1() : array{
        $dado = [];
        for ($i = 1 ; $i < 6 ; $i++){
            $num = random_int(1,6);
            $dado[$i] = $num;
        }

     echo '<h1 id="jugada1">';
     foreach ($dado as $valor) {
        switch ($valor){
            case 1 : echo DADO1 ; break;
            case 2 : echo DADO2 ; break;
            case 3 : echo DADO3 ; break;
            case 4 : echo DADO4 ; break;
            case 5 : echo DADO5 ; break;
            case 6 : echo DADO6 ; break;
        }
    }
     echo '</h1>';
     return $dado;
    }

    function jugada2() : array  {
        $dado = [];
        for ($i = 1 ; $i < 6 ; $i++){
            $num = random_int(1,6);
            $dado[$i] = $num;
        }

     echo '<h1 id="jugada2">';
     foreach ($dado as $valor) {
        switch ($valor){
            case 1 : echo DADO1 ; break;
            case 2 : echo DADO2 ; break;
            case 3 : echo DADO3 ; break;
            case 4 : echo DADO4 ; break;
            case 5 : echo DADO5 ; break;
            case 6 : echo DADO6 ; break;
        }
    }
    echo '</h1>';
    return $dado;
    }
    function calcularPuntos1($dado) : int{
     $puntos1 = 0;
     foreach ($dado as $valor){
        $puntos1 = $puntos1 + $valor;
     }
     return $puntos1;
    
    }
    function calcularPuntos2($dado) : int{
     $puntos2 = 0;
     foreach ($dado as $valor){
        $puntos2 = $puntos2 + $valor;
     }
     return $puntos2;
    }
   
    function mostrarGanador($puntos1, $puntos2) : int{
     $puntos1 = $puntos1;
     $puntos2 = $puntos2;
     $ganador = 0;

     if($puntos1 == $puntos2){
        return 0;
     }
     if ($puntos1 > $puntos2){
        return 1;
     }
     if($puntos1 < $puntos2){
        return 2;
     }
    }
    
      echo "Jugador 1 "; 
      $jugada1 = jugada1();
      echo "</br>"; 
      echo "Jugador 2";
      $jugada2 = jugada2(); 
      $puntos1 = calcularPuntos1($jugada1);
      $puntos2 = calcularPuntos2($jugada2); 
      echo "Jugador 1 --> $puntos1  puntos  " . "  Jugador 2 --> $puntos2 puntos </br>";
      $ganador = mostrarGanador($puntos1, $puntos2);
        if ($ganador != 0){
           echo "El ganador es el jugador $ganador " ;
        }else{
           echo "¡EMPATE!";
        }
      
      
     


    ?>
  <style>
    #jugada1{
        background-color:blue;
        width: 150px;
    }
      #jugada2{
        background-color:red;
        width: 150px;
    }
  </style>
</body>
</html>