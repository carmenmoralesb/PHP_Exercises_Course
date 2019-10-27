<!DOCTYPE html>
<html lang=”es”>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
$cajonDeSastre = [30, -7, "Me gusta el queso", 56, "¡eh!", 237];
// Mostrar el array utilizando foreach
foreach ($cajonDeSastre as $cosa) {
echo "$cosa<br/>";}
// Mostrar el mismo array utilizando for
echo "<hr/>";
for ($i=0;$i< count($cajonDeSastre);$i++){
echo "$cajonDeSastre[$i]<br/>";}
?>
</body>
</html>