<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" type="text/css" rel="stylesheet">
<title></title>
</head>
<body>
<?php

// Carga las funciones matemáticas
    require_once 'matematicas.php';
    $numero = $_POST['numero'];
    
    if (!isset($numero)) {
?>

Introduce un número para ver<br/>
<ul>
<li>1.Números primos</li>
<li>2.Números capicúa</li>
<li>3.Pasar de binario a decimal</li>
<li>4.Pasar de decimal a binario</li>
</ul>

<form action=numeroPrimo2.php method="post">
<input type="number" name="numero" min="0" autofocus><br/>
<input type="submit" value="Aceptar">
</form>
<?php
} else {
    if (esPrimo($numero)) {
        echo "El $numero es primo.";
    } 
    else {
        echo "El $numero no es primo.";
    }
}
?>
</body>
</html>