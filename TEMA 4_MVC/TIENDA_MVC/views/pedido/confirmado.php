<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') { ?>
	<h4>¡Tu pedido se ha confirmado!❤️</h4>
	<br/>
	<?php if (isset($pedido)) { ?>
		<h3>Datos del pedido:</h3>

		Número de pedido: <?= $pedido->id ?>  <br/>
		Total a pagar: <?= $pedido->coste ?> € <br/>
		Productos:

		<table>
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
			</tr>
			<?php while ($producto = $productos->fetchObject()) { ?>
				<tr>
					<td>
						<?php if ($producto->imagen != null) { ?>
							<img src="uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
						<?php  } else { ?>
							<img src="assets/img/camiseta.png" class="img_carrito" />
						<?php } ?>
					</td>
					<td>
						<a href="index.php?c=Producto&a=ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
					</td>
					<td>
						<?= $producto->precio ?>
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
						<?php } ?>
		</table>

						<?php } ?>

	<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') { ?>
	<h1>Ha habido un error con tu pedido, lo sentimos mucho.</h1>
	<?php } } ?>
