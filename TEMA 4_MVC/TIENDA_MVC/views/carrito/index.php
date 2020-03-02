<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) { ?>
	<table class="table table-bordered">  
	<thead class="thead-dark">
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Unidades</th>
		<th>Eliminar</th>
	</tr>
	<tbody>
	<?php 
		foreach($carrito as $indice => $elemento) {
		$producto = $elemento['producto'];
	?>
	
	<tr>
		<td>
			<?php if ($producto->imagen != null) {?>
				<img src="uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
			<?php } else { ?>
				<img src="assets/img/camiseta.png" class="img_carrito" />
			<?php } ?>
		</td>
		<td>

			<a href="index.php?c=Producto&a=ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
		</td>
		<td>
			<?=$producto->precio?>
		</td>
		<td>
			<?=$elemento['unidades']?>
			<div class="updown-unidades">
				<a href="index.php?c=Carrito&a=up&index=<?=$indice?>" class="btn btn-dark">+</a>
				<a href="index.php?c=carrito&a=down&index=<?=$indice?>" class="btn btn-dark">-</a>
			</div>
		</td>
		<td>
			<a href="index.php?c=Carrito&a=delete&index=<?=$indice?>" class="btn btn-danger">Quitar producto</a>
		</td>
	</tr>
	
			<?php } ?>
</table>
<br/>
<div class="delete-carrito">
	<a href="index.php?c=Carrito&a=delete_all" class="btn btn-danger">Vaciar carrito</a>
</div>
<div class="total-carrito">
	<?php $stats = Utils::cantidadesCarro(); ?>
	<h3>Precio total: <?=$stats['total']?> €</h3>
	<a href="index.php?c=Pedido&a=hacer" class="btn btn-dark">Hacer pedido</a>
</div>

<?php } else { ?>
	<p>El carrito está vacio, añade algun producto</p>
<?php } ?>