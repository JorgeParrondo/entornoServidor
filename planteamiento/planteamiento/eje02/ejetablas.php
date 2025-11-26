<?php

// DATOS DE PRUEBA
$precios = [250, 10, 50, 100, 50, 25, 5, 200, 10, 300, 50];
// Definimos rangos: 'Barato' hasta 20 inclusive, 'Medio' hasta 100, 'Caro' más de 100
$categorias = [
   1=> 'Barato',
   2=>'Medio',
   3=>'Caro'];

// LLAMADAS A FUNCIONES


$res1 = agruparPorCategoria($precios, $categorias);
print_r($res1);

$preciosRandom = generarDatos(1,500,20);
$res2 = agruparPorCategoria($preciosRandom, $categorias);
print_r($res2);



/**
 * Agrupa los precios según si son menores o iguales al valor de la categoría
 * En array tiene que estar los datos ORDENADOS de mas baratos a más caros
 * @param array $precios Lista numérica
 * @param array $categorias Array asociativo con los nombre de las categorias
 * @return array Array multidimensional
 */
function agruparPorCategoria($precios, $categorias): array {
      
     // COMPLETAR  ++++++++++++++++++++++++++++++
     //RECORRE PRIMERO LAS CATEGORIAS
     //no se cumple la condicion, lo pone todo en caro no se porque
   $resu = [];
     for($i = 0 ; $i < count($categorias); $i++){
             $resu[$categorias[$i]][] = [];
        }for($j = 0 ; $j < count($precios) ; $j++){
             if($precios[$j] <=  10){
                 $resu[$i][$j] = $precios[$j];
             }else{
               if($precios[$j] > 10 && $precios[$j] <= 100) {
                 $resu[$i][$j] = $precios[$j];
             }if($precios[$j] > 100){
                 $resu[$i][$j] = $precios[$j];
             }
             
        }
    }
    return $resu;
}
//GENERA CORRECTAMENTE UN ARRAY DE X NUMEROS CON X MINIMO Y X MAXIMO QUE DECIDA EL USUARIO
function generarDatos($min,$max, $nunelementos): array {
    $resultado = [];
    $min;
    $max;
    $nunelementos;
    for($i = 0;  $i < $nunelementos ; $i++){
      $valor = (random_int($min,$max));
      $resultado[$i] = $valor;
    }
    return $resultado;
}
