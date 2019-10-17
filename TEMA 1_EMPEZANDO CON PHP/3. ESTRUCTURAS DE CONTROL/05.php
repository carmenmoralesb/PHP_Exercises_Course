<?php

$num1 = $_POST["numero1"];
$par = 'No es par';
$auxi = $num1;

while ($auxi >= 10)  {
      $auxi /= 10;
 }
$primernum = (int)$auxi; 

$ultimonum = $num1 % 10; 

if ($num1%2==0) {
    $par = 'Sí es par';
}

echo "Pirmer número:  " .$primernum. "  último número:  " .$ultimonum. " ¿Es par? " .$par ;
?>