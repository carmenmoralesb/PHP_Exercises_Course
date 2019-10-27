<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
// Tres maneras de asignar valores a un Array asociativo
//Asignando los valores con array(valores);
$estatura = array("Rosa" => 168, "Ignacio" => 175, "Daniel" => 172, "Rubén" =>
182);
echo "La estatura de Daniel es ". $estatura['Daniel'] . " cm<br/>";
//Asignando los valores individualmente
$estatura2['Rosa'] = 168;
$estatura2['Ignacio'] = 175;
$estatura2['Daniel'] = 172;
$estatura2['Rubén'] = 182;
//Mostramos por pantalla una lista de las alturas (Sin nombre)
foreach ($estatura2 as $altura){
echo "$altura cm<br/>";
}
// Asignando con corchetes
$estatura3 = [ "Rosa" => 168, "Ignacio" => 175, "Daniel" => 172, "Rubén" =>
182];
//Mostramos por pantalla todos los valores con sus claves
foreach ($estatura3 as $persona => $altura2) {
echo "La estatura de $persona es $altura2 cm<br/>";}
?>
</body>
</html>