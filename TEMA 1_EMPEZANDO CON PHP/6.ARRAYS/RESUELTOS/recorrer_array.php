<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
// Declaramos un array con 10 posiciones
$a = new SplFixedArray(10);
$a[0] = 843;
$a[2] = 11;
$a[6] = 1372;
// Los valores del array que no se han inicializado son NULL
foreach ($a as $elemento) {
    var_dump($elemento);
    echo "<br/>";
}
// Crear un array n con números aleatorios entre 0 y 10 (ambos incluidos)
for ($i = 0; $i < 10; $i++) {
    $n[$i] = rand(0, 10);
}
// Mostramos los elementos con foreach
foreach ($n as $elemento) {
    echo $elemento. "<br/>";}
?>
</body>
</html>