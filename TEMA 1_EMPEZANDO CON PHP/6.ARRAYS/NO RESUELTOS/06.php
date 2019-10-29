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
                <li><a href='05.html'>Ejercicio 5</a></li>
            </ul>
    </nav>
    </header>
<body>
<p>Haz un programa que pida 10 números y los introduzca en un array, tiene que mostrar
el máximo y el mínimo</p>

<?php
// creo un array vacio con null y 10 posiciones
if (isset($_POST['numeroIntroducido'])) {
    $numeroIntroducido = (int)$_POST['numeroIntroducido'];
    $contador = (int)$_POST['contador'];
    $numTexto = $_POST['numTexto'];
}

else {
    $numeroIntroducido = 0;
    $contador = 0;
    $numarray  = []; 
    $numTexto = '';
}
// si el contador es menor que 10
if ($contador<10) {
    // pido numeros
    if ($numeroIntroducido >= 0) {
        // losmeto en la posicion [contador] del array
        $numTexto += $numeroTexto . " " . $numeroIntroducido;
        // cadena con los numeros introducidos
        $contador++;
        require_once '06form.php';
    }
    require_once '06form.php';
    var_dump($numTexto);
    var_dump($contador);
}

else {
    // metodo explode para splitear la cadena
    $numarray = explode(" ", $numeroTexto);
    $maximo = 0;
    $minimo = 0;           
    
    foreach ($numarray as $n) {
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