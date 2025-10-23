<?php
echo ($_GET["orden"]);

echo "<br> Parámetros por GET <br>";
var_dump($_GET);
echo "<br> Parámetros por POST <br>";
var_dump($_POST);
echo "<br> Parámetros GET/POST <br>";
var_dump($_REQUEST);