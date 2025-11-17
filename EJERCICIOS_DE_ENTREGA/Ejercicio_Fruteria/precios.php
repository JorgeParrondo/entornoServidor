<?php
$precios =[];
$precios["Platanos"] = 3.1;
$precios["Limones"] = 1.5;
$precios["Naranjas"] = 2.5;
$precios["Manzanas"] = 2.5;
$precios["Kiwis"] = 4.5;

function generaOpciones (): String{
 
   global $precios;
   $resu ="";
   foreach ( $precios as $fruta => $precio){
      $resu .="<option value='$fruta'>".$fruta."</option> \n";
   }

   return $resu;
}