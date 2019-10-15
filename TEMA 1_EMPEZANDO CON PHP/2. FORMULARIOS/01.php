<?php
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];;
$edad = $_POST['edad'];
?>
<h1>VARIABLES DEL FORMULARIO</h1>
<?php
echo "<span style='color:blue'>Nombre:</span> $nombre<br/>";
echo " <span style='color:blue'>Apellidos: </span>$apellidos<br/>";
echo " <span style='color:blue'>Dirección: </span>$direccion<br/>";
echo " <span style='color:blue'>Edad: </span>$edad<br/>";
?>