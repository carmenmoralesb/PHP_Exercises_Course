<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>
<div class='contenedor'>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>
<body>
<?php include 'INCLUDES/header.php';?>
<main class="contenido">
<?php 
require_once 'INCLUDES/conecta.php';
$sql= 'select * from coche;';
$resultado= mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado)>0){
?>
<table>
<tr>
<th>ID</th>
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
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>