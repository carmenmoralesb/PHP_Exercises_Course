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
<?php

$a = [1,'Gatito',true,'Mapache',false];

for ($i=0;$i<count($a);$i++) {
    if (is_string($a[$i])) {
        echo '<p>Hola soy el elemento ' .$i. ' y soy una cadena</p>';
    }
    elseif (is_numeric($a[$i])) {
        echo '<p>Hola soy el elemento ' .$i. ' y soy un número</p>';
    }
    else {
        echo '<p>Hola soy el elemento ' .$i. ' y soy un booleano</p>';
    }
}


?>