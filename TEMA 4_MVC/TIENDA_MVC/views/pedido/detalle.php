<h1>Detalle del pedido</h1>

<?php if (isset($pedido)){ ?>
		<?php if(isset($_SESSION['admin'])) { ?>
			<h3>Cambiar estado del pedido</h3>
			<form action="index.php?c=Pedido&a=estado" method="POST">
				<input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
				<select name="estado">
					<option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
					<option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?>>En preparación</option>
					<option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?>>Preparado para enviar</option>
					<option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?>>Enviado</option>
				</select>
				<input type="submit" value="Cambiar estado" />
			</form>
			<br/>
		<?php } ?>

		<h3>Dirección de envio</h3>
		Provincia: <?= $pedido->provincia ?>   <br/>
		Cuidad: <?= $pedido->localidad ?> <br/>
		Direccion: <?= $pedido->direccion ?>   <br/><br/>

		<h3>Datos del pedido:</h3>
		Estado: <?=Utils::mostrarEstado($pedido->estado)?> <br/>
		Número de pedido: <?= $pedido->id ?>   <br/>
		Total a pagar: <?= $pedido->coste ?> $ <br/>
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
						<?php if ($producto->imagen != null) {?>
							<img src="uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
						<?php } else { ?>
							<img src="assets/img/camiseta.png" class="img_carrito" />
						<?php }?>
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
						<?php }?>
		</table>

						<?php } ?>