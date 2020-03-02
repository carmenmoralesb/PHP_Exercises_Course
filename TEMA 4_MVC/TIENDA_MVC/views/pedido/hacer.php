<?php if (isset($_SESSION['identity'])): ?>
	<h1>Hacer pedido</h1>
	<p>
		<a href="index.php?c=Carrito&a=index">Ver los productos y el precio del pedido</a>
	</p>
	<br/>
	<form action="index.php?c=Pedido&a=add" method="POST">
	<div class="form-group">
		<label for="provincia">Provincia</label>
		<input  class="form-control" type="text" name="provincia" required />
	</div>	
	<div class="form-group">
		<label for="ciudad">Ciudad</label>
		<input  class="form-control" type="text" name="localidad" required />
	</div>
	<div class="form-group">
		<label for="direccion">Dirección</label>
		<input class="form-control" type="text" name="direccion" required />
	</div>
		<button type="submit" class="btn btn-dark">Confirmar</button>
	</form>
		
<?php else: ?>
	<h1>Necesitas estar identificado</h1>
	<p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>
<?php endif; ?>


