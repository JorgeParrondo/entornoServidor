<?php
//como escribir en ficheros
$fichero = fopen('datos.txt','w');

fputs($fichero, 'mario es tonto '); //  '/n' significa un salto de linea
fputs($fichero, 'datos.txt se crea automaticamente si el código es correcto');

fclose($fichero); //si no se cierra el fichero en escritura no se guarda (!)

echo 'se ha escrito en el fichero correctamente'; 

?>