<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

echo "<h1>VEHÍCULOS</h1>";

include_once 'Vehiculo.php'; // no es necesario incluirla
include_once 'Bicicleta.php';
include_once 'Coche.php';

$mercedes = new Coche("Mercedes","4");
$lexus = new Coche("Lexus","4");
$bicimontania = new Bicicleta("montania","libre");
$bicipaseo = new Bicicleta();

echo "$mercedes<hr>";
echo "$lexus<hr>";
echo "$bicimontania<hr>";
echo "$bicipaseo<hr>";

echo "hacer caballito<br>";
$bicimontania->haceCaballito();
$bicipaseo->haceCaballito();

echo "<br>andar<br>";
$bicimontania->anda(5);
$lexus->anda(20);

echo "<br>quema rueda<br>";
$mercedes->quemaRueda();

echo "<br>ver kilometrajes<br>";
$lexus -> getKmRecorridos();
$bicimontania -> getKmRecorridos();
?>
</body>
</html>