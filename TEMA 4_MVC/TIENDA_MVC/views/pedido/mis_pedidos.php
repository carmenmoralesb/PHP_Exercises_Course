<?php if (isset($gestion)) { ?>
	<h1>Gestionar pedidos</h1>
<?php } else { ?>
	<h1>Mis pedidos</h1>
<?php } ?>
<table>
	<tr>
		<th>Nº Pedido</th>
		<th>Coste</th>
		<th>Fecha</th>
		<th>Estado</th>
	</tr>
	<?php
	while ($pedido = $pedidos->fetchObject()) {
		?>

		<tr>
			<td>
				<a href="index.php?c=Pedido&a=detalle&id=<?= $pedido->id ?>"><?= $pedido->id ?></a>
			</td>
			<td>
				<?= $pedido->coste ?> €
			</td>
			<td>
				<?= $pedido->fecha ?>
			</td>
			<td>
				<?=Utils::mostrarEstado($pedido->estado)?>
			</td>
		</tr>

	<?php } ?>
</table>