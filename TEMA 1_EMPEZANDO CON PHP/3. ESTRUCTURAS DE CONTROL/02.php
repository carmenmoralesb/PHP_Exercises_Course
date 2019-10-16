<?php 

$horasTrabajadas = $_POST['horas'];
$horasExtras = $horasTrabajadas - 40;
$horasNormales = 40 - $horasExtras;

$totalPago = (12*$horasNormales) + ($horasExtras*16);

echo "El pago total es " .$totalPago;

?>