<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset='utf-8'>
    <link href="estilo.css" type="text/css" rel="stylesheet">
    <title>EJERCICIO 6</title>
</head>

<body>
<?php 

$var = 0;

while ($var<100) {
    $var++;

    if ($var%5==0) {
        echo "  " .$var. "  " ;
    }
}

?>
</body>
</html>