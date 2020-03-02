<?php if (isset($categoria)){ ?>
	<h1><?= $categoria->nombre ?></h1>
	<?php if ($productos->rowCount() == 0){ ?>
		<p>No hay productos para mostrar</p>
	<?php } else { ?>
		<section class="product-grid">

		<?php while ($producto = $productos->fetchObject()) { ?>
			<div class="grid-item">
				<a href="index.php?c=Producto&a=ver&id=<?= $producto->id ?>">
					<?php if ($producto->imagen != null) { ?>
						<img class="img-fluid" src="uploads/images/<?= $producto->imagen ?>" width=100% style="max-width: 100px;"></a>
					<?php } else { ?>
						<img class="img-fluid" src="assets/img/default.png" /></a>
					<?php } ?>
					<h4><?= $producto->nombre ?></h4>
					<h5><?= $producto->precio ?></h5>
				<a href="index.php?c=Carrito&a=add&id=<?=$producto->id?>" class="btn btn-dark">Comprar</a>
				</div>
					<?php } ?>
					<?php } ?>
					</section>


					<?php } else { ?>
	<h1>La categoría no existe</h1>
<?php } ?>
