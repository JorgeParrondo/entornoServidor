<?php

function sumar ($num1, $num2, &$resultado) {
   $resultado =  $num1 + $num2;
}
function restar($num1, $num2, &$resultado){
    $resultado = $num1 - $num2;
}
function multiplicar($num1, $num2, &$resultado){
    $resultado = $num1 * $num2;
}
function dividir($num1, $num2, &$resultado){
    $resultado = $num1 / $num2;
}
function modulo($num1, $num2, &$resultado){
    $resultado = $num1 % $num2;
}
function potencia($num1, $num2, &$resultado){
    $resultado = $num1 ** $num2;
}


?>