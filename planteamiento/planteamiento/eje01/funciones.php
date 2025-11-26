<?php

include "dat/Cliente.php";

//El programa falla debido a que cargarTablaClientes y salvarTablaClientes no funcionan correctamente,
//no obstante el programa deberia funcionar con estas si fuesen funcionales
/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */

function cargarTablaClientes (): array {

    $tclientes = [];
    $fichero = @fopen('dat/clientes.csv', 'r') or die("ERROR al abrir fichero de usuarios"); // abrimos el fichero para lectura
    
     while ($tclientes = fgetcsv($fichero)) {
        // Escribimos la correspondiente fila en tabla
       //GUARDO LOS VALORES DE MI OBJETO EN TCLIENTE GRACIAS A SU METODO CONSTRUCTOR
        $cli = new Cliente(
        $cli->dni = $tclientes[0],
        $cli->nombre = $tclientes[1],
        $cli->clavclavehashe = $tclientes[2],
        $cli->puntos = $tclientes[3],
        );
       
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
    global $tclientes;
    //cambio el nombre para no alterarlo hasta que sea funcional
    $fich = @fopen('dat/clientesescritos.csv','w');
    // COMPLETAR
    foreach( $tabla as $valores){
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
//DEBERIA SER FUNCIONAL
function validarCliente($dni, $clave) :bool{
    $tablacli = cargarTablaClientes();
    $resu = false; 

    $fich = fopen("clientes.csv","r");                                                                                  
    while ( $tablaCli = fgetcsv($fich)){  
        //password_verify(contraseña, valor que comparar)
        if ($tablaCli[0] == $dni && password_verify($clave,$tablaCli[2])){
            $resu = true;
            break;
        }
    }
    fclose($fich);
    return $resu;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
//DEBERIA SER FUNCIONAL
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    $fich = fopen("clientes.csv","r");                                                                                  
    $resu = false;
    //recorre en csv
    while ( $tablaCli = fgetcsv($fich)){
        //si el nombre ya existe porque se iguala al de usuario se suma 1 al tercer valor que es el numero de accesos
        if ($tablaCli[0] == $dni ){
            $tablaCli[3] = $tablaCli[3] + $_SESSION['puntos']; 
            $resu = true;
        }
    }
    fclose($fich);
    return $resu;
}




