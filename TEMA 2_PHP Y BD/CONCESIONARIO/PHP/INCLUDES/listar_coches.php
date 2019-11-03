<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="estilo.css" type="text/css" rel="stylesheet">
</head>
<div class='contenedor'>
<?php include 'header.php';?>
<?php include 'nav.php';?>
<body>
<?php include 'header.php';?>
<main class="contenido">
<?php 
require_once 'conecta.php';
$sql= 'select * from coche;';
$resultado= mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado)>0){
?>
<table>
<tbody>
<tr><th>Coches del concesionario</th>
<th>Marca</th>
<th>Modelo</th>
<th>Precio</th>
<th>Stock</th>
</tr>
<?php 
while ($fila= mysqli_fetch_assoc($resultado) ){?>
<tr><td><?= $fila['id']?></td>
<td><?= $fila['marca']?></td>
<td><?= $fila['modelo']?></td>
<td><?= $fila['precio']?></td>
<td><?= $fila['stock']?></td></tr>
<?php
}
}else{
echo '0 Registros';}
mysqli_close($conexion);
?>
</tbody>
</table>
</main>
<?php include 'footer.php';?>
</div>
</body>
</html>