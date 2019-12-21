<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php

echo "<h1>LOS ARISTOGATOS</h1>";

include_once 'Animal.php'; // no es necesario incluirla
include_once 'Gato.php';

$toulouse= new Gato("Toulouse","macho","romano");
$berlioz = new Gato("Berlioz","macho");
$marie = new Gato("Marie","hembra","Angora");
$silvestre = new Gato();

echo "$toulouse<hr>";
echo "$berlioz<hr>";
echo "$marie<hr>";
echo "$silvestre<hr>";

echo "toma tarta<br>";
$marie->come("tarta selva negra");

echo "toma pescado<br>";
$toulouse->come("pescado");

?>
</body>
</html>