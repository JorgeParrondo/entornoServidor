<?php
//Lectura de ficheros básica 
$fichero = fopen('datos.txt', 'r'); // r --> read,  w --> write, a --> append (pone el puntero al final del fichero y escribe sin machacar) 

while(!feof($fichero)){ //feof --> final de fichero, cuando el fichero llegue al final, para de buscar
 $texto =  fgets($fichero);
 echo $texto;
}

fclose($fichero);
?>