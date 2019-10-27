<!DOCTYPE html>
<html lang=”es”>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
//declaramos 3 arrays de manera diferente
$temp[0] = 16;
$temp[1] = 15;
$temp[2] = 17;
$temp[3] = 15;
$temp[4] = 16;
$color = ["verde", "amarillo", "rojo", "azul", "blanco", "gris"];
$peliculas= array ("La llegada", "Star Wars", "Batman el caballero oscuro");
// Imprimimos por pantalla algún dato de los array
echo "<p>La temperatura en Málaga el cuarto día fue de $temp[3] oC</p>";
echo '<p>Mañana me pongo una camiseta de color '. $color[0].'</p>';
echo '<p> Mi película preferida es '. $peliculas[0].'</p>';
// Otra manera de insertar un valor en la última posición del array $color
$color[]="negro";
echo "Mañana me pongo una camiseta de color ", $color[6], ".";
?>
</body>
</html>