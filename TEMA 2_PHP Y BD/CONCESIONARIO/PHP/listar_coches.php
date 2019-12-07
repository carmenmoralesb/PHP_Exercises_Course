<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet"></head>

<body>

<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>

<?php 
require_once 'INCLUDES/conecta.php';

$sql= "SELECT * FROM coche";
$resultado= mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)>0){
?>
<div class="contenido">
<p><?php

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}



?></p>
<table>
<tr>
<th>ID</th>
<th>Marca</th>
<th>Modelo</th>
<th>Precio</th>
<th>Stock</th>
<th>Editar</th>
<th>Borrar</th>
</tr>
<?php 
while ($fila= mysqli_fetch_assoc($resultado) ){?>
<tr><td><?= $fila['id']?></td>
<td><?= $fila['marca']?></td>
<td><?= $fila['modelo']?></td>
<td><?= $fila['precio']?></td>
<td><?= $fila['stock']?></td>

<td><a href="modificar_coche.php?id=<?php echo $fila['id']?>"><i class="fas fa-edit"></i></a></td>
<td><a href="borrar_coche.php?id=<?php echo $fila['id']?>"><i class="fa fa-minus-square" aria-hidden="true"></i></a></td>

</a></td>
</tr>

<?php
}
}else{
echo '0 Registros';}
mysqli_close($conexion);
?>
</tbody>
</table>
</div>
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>