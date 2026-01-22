<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */
//FUNCIONAL
function cargarTablaClientes (): array {

    $tclientes = [];
     // COMPLETAR
     $fichero = @fopen("dat/clientes.csv", "r") or die("error");
     while($datos = fgetcsv($fichero)){
        $dni = $datos[0];
        $nombre = $datos[1];
        $clave = $datos[2];
        $puntos = $datos[3];
        $cli = new Cliente($dni,$nombre,$clave,$puntos);
        $tclientes[] = $cli;
     }
    fclose($fichero);
    return $tclientes;

}

/**
 * Escribe la tabla de objectos clientes en el fichero csv
 * @param  $tabla - array de objectos
 */

function salvarTablaClientes(array $tabla){

    $fich = fopen('dat/clientes.csv','w');
     
    // COMPLETAR
    foreach ($tabla as $cli){
        $valores = [ $cli->dni, $cli->nombre, $cli->clavehash,$cli->puntos];
        fputcsv($fich,$valores);
    }
    fclose($fich);

}

/**
 * Valida usuario y contraseña contra clientes.csv
 * @param string $dni DNI del cliente
 * @param string $clave Contraseña en texto plano
 * @return true Si el usuario y la contraseña son correctas
 */
function validarCliente($dni, $clave) :bool{
    $tablacli = cargarTablaClientes();
    $existeCliente = false;
    // COMPLETAR
    for($i = 0; $i < count($tablacli); $i++){
        if($tablacli[$i]->dni == $dni && password_verify($clave, $tablacli[$i]->clavehash)){
            $existeCliente = true;
        }
    }
    return $existeCliente;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    $cambiado = false;
    for($i = 0; $i < count($tablaCli); $i++){
        if($tablaCli[$i]->dni == $dni){
            $tablaCli[$i]->puntos == $puntos;
            $cambiado = true;
        }
    }
    salvarTablaClientes($tablaCli);
    // COMPLETAR

    return false;
}




