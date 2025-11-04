<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiedraPapelTijeras</title>
</head>
<body>
    <h1>¡PIEDRA, PAPEL, TIJERAS!</h1>
    <H3>Actualice para jugar otra partida</H3>

    <?php
 define ('PIEDRA1',  "&#x1F91C;");
 define ('PIEDRA2',  "&#x1F91B;");
 define ('TIJERAS',  "&#x1F596;");
 define ('PAPEL',    "&#x1F91A;" );

  function jugada1() : int{
   $mi_jugada1 = random_int(0,2);
   switch ($mi_jugada1){
    case 0: echo PIEDRA1; return 0; break;
    case 1: echo PAPEL; return 1; break;
    case 2: echo TIJERAS; return 2; break;
   }
}
   function jugada2() : int{
   $mi_jugada2 = random_int(0,2);
   switch ($mi_jugada2){
    case 0: echo PIEDRA2; return 0; break;
    case 1: echo PAPEL; return 1; break;
    case 2: echo TIJERAS; return 2; break;
   }
}


//se que es una chapuza pero no se me ocurre como hacerlo mas simple
Function quienGana() :int {
 $jugada1 = jugada1();
 $jugada2 = jugada2();
 if($jugada1 == $jugada2){
    return 0;
  }
 if($jugada1 == 0 && $jugada2 == 2){
  return 1;
 }
 if ($jugada1 == 1 && $jugada2 == 0){
    return 1;
 }
 if($jugada1 == 2 && $jugada2 == 1){
    return 1;
 }
  if($jugada2 == 0 && $jugada1 == 2){
    return 2;
 }
 if ($jugada2 == 1 && $jugada1 == 0){
    return 2;
 }
 if($jugada2 == 2 && $jugada1 == 1){
    return 2;
 }
}
 $ganador = quienGana();
 
 if ($ganador != 0){
  echo "El ganador es el jugador $ganador " ;
 }else{
  echo "¡EMPATE!";
 }

 ?>
</body>
</html>