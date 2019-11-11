<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></head>

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

<td><a href="modificar_coche.php?id=<?php echo $fila['id']?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
<td><a href="borrar_coche.php?id=<?php echo $fila['id']?>"><i class="fa fa-minus-square" aria-hidden="true"></i></i>

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