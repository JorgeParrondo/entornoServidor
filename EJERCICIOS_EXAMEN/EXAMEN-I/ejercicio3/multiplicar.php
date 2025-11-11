<?php
//El programa muestra las tablas de multiplicar del 1 al 10
$numeros = [ 1 => 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez'];
$tmulti = [];

foreach ( $numeros as $pos => $nombre){
    $tabladevalores = [];
    for($i = 1; $i <= 10; $i++){
        $tabladevalores[$i] =  $pos * $i;
    }
    $tmulti[$nombre] = $tabladevalores;
}
echo "<pre> <code>";
 var_dump($tmulti);
echo "<pre> <code>";
?>