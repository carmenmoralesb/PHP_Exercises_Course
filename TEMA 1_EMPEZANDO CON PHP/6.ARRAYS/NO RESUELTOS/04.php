<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset='utf-8'>
    <link href="estilo.css" type="text/css" rel="stylesheet">
    <title>EJERCICIO 1</title>
</head>

<body>
    <header>
        <nav class='naveg'>
            <ul>
            <li><a href='01_ini.php'>Ejercicio 1</a></li>
<li><a href='02.php'>Ejercicio 2</a></li>
<li><a href='03.php'>Ejercicio 3</a></li>
<li><a href='04.php'>Ejercicio 4</a></li>
<li><a href='05.php'>Ejercicio 5</a></li>
<li><a href='06.php'>Ejercicio 6</a></li>
<li><a href='07.php'>Ejercicio 7</a></li>
            </ul>
    </nav>
    </header>
<div id="salida">
    <p>Ejercicio 4: Crea un array asociativo donde cada elemento es un array con el contenido de
la tabla.</p>
<table>
<?php

$juego["Acción"] =['GTA5','Call Of Duty','PUGB'];
$juego["Aventura"] = ['Assasins Creed','Tomb Raider','Last Of Us'];
$juego["Deporte"] = ['FIFA','PES','MOTO GP'];

$claves = array_keys($juego);
echo "<table>";
for ($i=0;$i<count($claves);$i++) {
    echo "<th>$claves[$i]</th>";
}

$pos = 1;
echo "<tr>";
foreach ($juego as $array) {
foreach ($array as $valor) {
    #sacar las celdas por posicion
    echo "<td>$valor</td>";
}
echo "<tr>";
}
echo "</table>";
?>
</table>
</div>
</body>
</html>