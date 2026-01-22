<?php 

/**
 *  Genera una cadena con tantos asteriscos como indique el parámetro
 * @param int $num
 * @return string
 */
function verEstrellas( int $num):string {
    $msg = "";
    for($i=0; $i < $num; $i++){
        $msg .= "★";
    }
    return $msg;
}
/**
 *  Muestra un mensaje según el valor de plazas, si es menor de 5  devuelve 
 *  la cadena 'Ultimas plazas' y es caso contrario 'Disponibles'
 * @param int $plazas
 * @return string
 */
function verEstado ( int $plazas):string {
    $resultado = "";
    if($plazas <= 5 && $plazas > 0){
        $resultado = "Ultimas plazas";
    }
    if($plazas > 5){
        $resultado = "Plazas disponibles";
    }
    return $resultado;
}