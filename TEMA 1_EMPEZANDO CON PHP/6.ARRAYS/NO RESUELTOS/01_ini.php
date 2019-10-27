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
<div id="salida">
<?php
for ($i = 0; $i < 8; $i++) {
    $n[$i] = rand(0, 10);
}

Require_once '01.php';
echo '<h2>Recorreindo el array</h2>';
mostrarArray($n);
echo '<br><br><h2>Array sin último elemento</h2>';
mostrarMenosUno($n);
echo '<br><br><h2>Array ordenado</h2>';
OrdenarArray($n);
echo '<br><br><h2>Mostrar longitud</h2>';
mostrarLong($n);
echo '<br><br><h2>Buscar elemento</h2>';
buscarEle($n,4);
echo '<br><br><h2>Voltear array</h2>';
voltearArray($n);
echo '<br><h2>Coger de la URL</h2>';
cogerdeURL($_SERVER["REQUEST_URI"]);
?>
</div>
</body>
</html>