<?php 
define ('FILEUSER','dat/usuarios.txt');
/**
 * 
 * Compruba que la usuario y la contraseña son correctos consultando
 * el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool
 */
function userOk ( $login, $passwd):bool {

    return false;
}

/**
 *  Actualiza la password de un usuario en el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool true si el usuarios existe en el fichero
 */
function updatePasswd ($login, $passwd):bool {
    return true;
}


