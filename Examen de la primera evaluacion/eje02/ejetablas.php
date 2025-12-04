<?php

// DATOS DE PRUEBA
$precios = [250, 10, 50, 100, 50, 25, 5, 200, 10, 300, 50];
// Definimos rangos: 'Barato' hasta 20 inclusive, 'Medio' hasta 100, 'Caro' más de 100
$categorias = ['Barato','Medio','Caro'];

// LLAMADAS A FUNCIONES

echo "<h1>LLamada al array con valores predeterminados </h1>" . "</br>";
$res1 = agruparPorCategoria($precios, $categorias);
print_r($res1);

echo "<h1>LLamada al array con valores random </h1>";
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
    $resultado = [];
    sort($resultado);
    $resultado[0] = ['Barato'];
    $resultado[1] = ['Medio'];
    $resultado[2] = ['Caro'];
    foreach($precios as $precio){
        if($precio <= 10){
              $resultado[0][] = $precio;     
        }else if($precio <= 100){
              $resultado[1][] = $precio;
        }else{
              $resultado[2][] = $precio;
        }
    }
    return $resultado;
}

function generarDatos($min,$max, $nunelementos): array {
    $resultado = [];
    $min;
    $max;
    $nunelementos;  
    
    for($i=0; $i < $nunelementos; $i++){
       $numero = random_int($min,$max);
       $resultado[$i] = $numero;
    }


    return $resultado;
}
