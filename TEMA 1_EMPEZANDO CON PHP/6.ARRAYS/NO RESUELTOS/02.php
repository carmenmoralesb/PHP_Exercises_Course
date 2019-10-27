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
                <li><a href='05.html'>Ejercicio 5</a></li>
            </ul>
    </nav>
    </header>
<?php

$contador = 0;
$a = [];

while ($contador<120) 
{
$contador ++;
Array_push($a,"Elemento $contador.");
}

var_dump($a);



?>