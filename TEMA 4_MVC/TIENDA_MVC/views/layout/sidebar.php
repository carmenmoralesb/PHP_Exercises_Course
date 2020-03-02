<aside id="lateral">
	<div class="col-12" id="carrito">
		<h3>Mi carrito</h3>
		<ul>
			<?php $cantidades = Utils::cantidadesCarro() ?>
			<?php if (isset($_SESSION['identity'])) {?>
			<li><a href="index.php?c=Carrito&a=index">Productos <span class="badge badge-dark"><?=$cantidades['count']?></a></span></li>
			<li><a href="index.php?c=Carrito&a=index">Total: <span class="badge badge-dark"> <?=$cantidades['total']?> €</span></a></li>
			<li><a href="index.php?c=Carrito&a=index">Ver el carrito</a></li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="col-12" id="carrito">
		<?php if(!isset($_SESSION['identity'])) { ?>
			<h3>Entrar a la web</h3>
			<form action="index.php?c=Usuario&a=login" method="POST">
			<div class="input-group mb-2">				
			<div class="input-group-prepend">
		  <div class="input-group-text">Email</div>
		</div>
				<input class="form-control" type="email" name="email" />
			</div>
			<div class="input-group mb-2">
			<div class="input-group-prepend">
		  <div class="input-group-text">Clave</div>
		</div>
			<input class="form-control" type="password" name="password" />
			</div>
			<button type="submit" class="btn btn-dark">Iniciar sesión</button>
			</form>
		<?php } else { ?>
			<h3><?=$_SESSION['identity']->nombre?></h3>
		<?php }?>
		<ul>
			<?php if(isset($_SESSION['admin'])) { ?>
				<li><a href="index.php?c=Categoria&a=index">Gestionar categorias</a></li>
				<li><a href="index.php?c=Producto&a=gestion">Gestionar productos</a></li>
				<li><a href="index.php?c=Pedido&a=gestion">Gestionar pedidos</a></li>
			<?php } ?>
			
			<?php if(isset($_SESSION['identity'])) { ?>
				<li><a href="index.php?c=Pedido&a=mis_pedidos">Mis pedidos</a></li>
				<li><a href="index.php?c=Usuario&a=logout">Cerrar sesión</a></li>
			<?php } else { ?> 
				<li><a href="index.php?c=Usuario&a=registro">Registrate aqui</a></li>
			<?php }?> 
		</ul>
	</div>
</aside>
<div id="central">
