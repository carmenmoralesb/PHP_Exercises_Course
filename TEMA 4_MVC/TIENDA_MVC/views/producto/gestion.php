<h1>Gestión de productos</h1>

<a href="index.php?c=Producto&a=crear" class="btn btn-primary mb-4">
	Añadir un producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::borraSesion('producto'); ?>
	
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::borraSesion('delete'); ?>
	
<table class="table">
  <thead class="thead-dark">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>PRECIO</th>
		<th>STOCK</th>
		<th>ACCIONES</th>
	</tr>
</thead>
<tbody>
	<?php while($pro = $productos->fetchObject()) { ?>
		<tr>
			<td><?=$pro->id;?></td>
			<td><?=$pro->nombre;?></td>
			<td><?=$pro->precio;?></td>
			<td><?=$pro->stock;?></td>
			<td>
				<a href="index.php?c=Producto&a=editar&id=<?=$pro->id?>" class="btn btn-warning">Editar</a>
				<a href="index.php?c=producto&a=eliminar&id=<?=$pro->id?>" class="btn btn-danger">Eliminar</a>
			</td>
		</tr>
		</tbody>
	<?php } ?>
</table>
