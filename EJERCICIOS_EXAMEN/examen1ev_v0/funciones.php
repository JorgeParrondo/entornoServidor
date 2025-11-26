<?php

/**
 * Checks if the provided username and password are valid.
 *
 * @param string $username The username to validate.
 * @param string $password The password to validate.
 * @return bool Returns true if the username and password are valid, false otherwise.
 */
function accesoValido($username, $password): bool
{
    $fich = fopen("usuarios.dat","r");
    $resu = false;
    //                                                                                        valores[0] , valores[1], valores[2]. 
    // pepe,$2y$10$Q156QnuOb6nDXYlMnkaDueOn8WelAs.tpp4BIw3FshIgLje0FMUem,3 -->filegetscsv --> [pepe      ,(contraseña), 3]
    while ( $valores = fgetcsv($fich)){  //lee mi fichero como un csv (fgetscsv)
        //password_verify(contraseña, valor que comparar)
        if ($valores[0] == $username && password_verify($password,$valores[1])){
            $resu = true;
            break;
        }
    }
    fclose($fich);
    return $resu;
}

/**
 * Records a new access for the given username.
 *
 * @param string $username The username for which to record the access.
 * @return int The result of the access recording operation.
 */
function anotarNuevoAcceso($username):int{
    $fich = fopen("usuarios.dat","r");
    $resu = false;
    $usuarios=[];
    //recorre en csv
    while ( $valores = fgetcsv($fich)){
        //si el nombre ya existe porque se iguala al de usuario se suma 1 al tercer valor que es el numero de accesos
        if ($valores[0] == $username ){
            $valores[2] = $valores[2]+1; 
            $resu = true;
        }
        //crea una tabla en la que vuelca los valores del fichero
        $usuarios[] = $valores;
    }
    fclose($fich);
   //si no se cumple la condicion se usa volcar usuarios que crea un nuevo usuario
    if ($resu == false) {
        volcarDatos($usuarios);
    }
    return $resu;
    
}

/**
 *  Vuelca los datos el array de usuarios en el fichero
 * 
 */
function volcarDatos ($tabla){
    
   $fich = fopen("usuarios.dat","w");
   foreach( $tabla as $valores){
      fputcsv($fich,$valores);
   }
   fclose($fich);
}


/**
 * Registers a user with a given username and time.
 *
 * @param string $username The username of the user to register.
 * @param int $time The time associated with the registration.
 */
function registra($username,$time){
     $ip = $_SERVER["REMOTE_ADDR"];
     $nombre = $username;
     $tiempo = date("d-m-Y h:i",$time);
     //mete los 3 datos en una linea
     $linea = $ip.",".$nombre.",".$tiempo."\n";
     //lo mete todo en el fichero con APPEND para que no machaque
     $resu = @file_put_contents("registro.log",$linea,FILE_APPEND);
    return $resu;
}

