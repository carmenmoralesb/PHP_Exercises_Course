
<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset='utf-8'>
    <link href="estilo.css" type="text/css" rel="stylesheet">
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
<?php

$diccionario = array (
        "gato" => "cat",
        "perro" => "dog",
        "mapache" => "raccoon",
        "periquito" => "parakeet",
        "nutria" => "otter",
        "zarigüeya" => "opossum"
);

if (isset($_GET['palabra'])) {

    $palabra = $_GET['palabra'];
    $respondidas = []
    
    foreach ($diccionario as $clave => $valor) {
        $espanol[] = $clave;
    }

    $claves_aleatorias = array_rand($diccioario, 5);
    echo "<p>Traduce las siguientes palabras</p>";
    for ($i=0;$i<count($claves_aleatorias)) {
        echo "<p>$claves_aleatorias[$i]</p>";
    }

    $diccionario[$palabra]."</b><br><br>";

else {
    require_once '07form.php';
}
?>
</div>
</body>
</html>