<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<p>Haz un programa con un array de 8 números enteros aleatorios (0,10) y haz lo
siguientes</p>

<ul>
<li>o Haz una función mostrarArray($Array).</li>
<li>o Haz una función que devuelva un array sin el último elemento del array (No utilices
funciones predefinidas). Compara el resultado de tu función y la función
predefinida</li>
<li>o Ordenarlo y mostrarlo</li>
<li>o Mostrar su longitud</li>
<li>o Buscar algún elemento y mostrar el índice</li>
<li>o Voltea el Array</li>
<li>o Busca algún elemento que nos introduzcan por la url</li>
</ul>
<?php

// Fucnión mostrarArray 

//Mostramos los elementos con foreach

function mostrarArray($n) {
    //var_dump($n);
foreach ($n as $elemento) {
    //var_dump($elemento);
    echo "<p> $elemento </p>" ;
}
}

function mostrarMenosUno($n) {
    //var_dump($n);
    $totalPosiciones = count($n);
    for ($i=0;$i<$totalPosiciones-1;$i++){
        echo "$n[$i]<br/>";
    } 
}

function OrdenarArray($n) {
    //var_dump($n);
    sort($n);
    foreach ($n as $elemento) {
        //var_dump($elemento);
        echo "<p> $elemento </p>" ;
    } 
}

function mostrarLong($n) {
    //var_dump($n);
    $totalLong = count($n);
    echo $totalLong;
}

function buscarEle($n,$elebusca) {
    //var_dump($n);
    $totalPosiciones = count($n);
    for ($i=0;$i<$totalPosiciones-1;$i++){
        if ($n[$i]==$elebusca) {
            echo "<p>Encontrado $elebusca en índice $i </p>";
        }
    } 
}

function voltearArray($n) {
    $lon = count($n);
  
    for($i=$lon-1; $i>=0; $i--){
        echo "<p> $n[$i] </p>";
    }
}



function cogerdeURL($n) {
    echo $n;
}
?>