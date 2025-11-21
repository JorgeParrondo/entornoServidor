<?php
// DATOS DE PRUEBA
$datos = [20,30,34,34,49,8,15,50,48,9,954,12,49,4,3,9,5,7,14,21];
$divisores = [3,5,7];

// Divisores de 3, 5, 7 
$tdivisores       = obtenerDivisoresTodos ($datos,$divisores);

// Divisores de 3, 5, 7 sin repetir ( Sin es 3 no esta entre los de 5...
$tdivisoresSinRep = obtenerDivisoresNoRepes($datos,$divisores);


/**
 *  Devuelve un array asociativo con los números que son divisibles 
 * de la tabla de datos por los números de la tabla divisores 
 * @param mixed $datos 
 * @param mixed $divisores
 * @return array
 */

function obtenerDivisoresTodos ($datos,$divisores):array{
  
    $resu = [];     
     // COMPLETAR  ++++++++++++++++++++++++++++++
     for($i = 0 ; $i < count($divisores); $i++){
         $resu[$divisores[$i]] = [];
        }for($j = 0 ; $j < count($datos) ; $j++){
             if($datos[$j] % $divisores[$i] == 0){
                 $resu[$divisores[$i]] [] = $datos[$j];
            }
        }
    return $resu;

}
/**
 * Devuelve un array asociativo con los números que son divisibles de la tabla 
 * de la tabla datos por los números de la tabla divisores. Evita que un mismo 
 * número divisible este en dos tablas (No se repiten)
 * @param mixed $datos 
 * @param mixed $divisores
 * @return array
 */
function obtenerDivisoresNoRepes ($datos,$divisores):array{
 
    $resu = [];
    for ($i = 0; $i <count($divisores); $i++){
        $resu[$divisores[$i] ] = [];
          foreach ( $datos as $key => $valor){
            if ($valor % $divisores[$i] == 0){
                // Si no está incluido previamente 
                if (array_search($valor,$resu[$divisores[$i]]) === false ){
                $resu[$divisores[$i]][] = $valor;
                }
                unset($datos[$key]);
            }
        }

    }
    return $resu;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
    <h2> Tabla de divisores </h2>
    <?=  print_r($tdivisores) ?>
    <hr>
    <h2> Tabla de divisores sin repes </h2>
    <?= print_r($tdivisoresSinRep); ?>
    </pre>
</body>
</html>