<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" type="text/css" rel="stylesheet">
</head>
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
<body>
<p>Haz un programa que pida 10 números y los introduzca en un array, tiene que mostrar
el máximo y el mínimo</p>

<?php
$numArray  = [];
// creo un array vacio con null y 10 posiciones
if (isset($_POST['numeroIntroducido'])) {
    $numeroIntroducido = (int)$_POST['numeroIntroducido'];
    $contador = (int)$_POST['contador'];
    $numTexto = $_POST['numTexto'];
}

else {
    $numeroIntroducido = 0;
    $contador = 0;
    $numTexto = '';
}
// si el contador es menor que 10
if ($contador<10) {
    // pido numeros
    if ($numeroIntroducido >= 0) {
        require_once '06form.php';
        $numArray = array_push($numArray, $numeroIntroducido);
    }
    require_once '06form.php';
    var_dump($contador);
}

else {
    var_dump($numArray);
    // metodo explode para splitear la cadena
    $maximo = 0;
    $minimo = 0;           
    
    foreach ($numArray as $n) {
        if ($n>$maximo) {
            $maximo = $n;
        }
        if ($n<$minimo) {
            $minimo = $n;
        }
    }
    echo "El maximo y minimo son " .$maximo. "  " .$minimo;
    }
        ?>