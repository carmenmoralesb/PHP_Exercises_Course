<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'){ ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php } elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'){ ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php } ?>
<?php Utils::borraSesion('register'); ?>

<form action="index.php?c=Usuario&a=save" method="POST">
	<div class="form-group>">
	<label for="nombre">Nombre</label>
	<input class="form-control" type="text" name="nombre" required/>
</div>
<div class="form-group>">

	<label for="apellidos">Apellidos</label>
	<input class="form-control" type="text" name="apellidos" required/>
	</div>
	<div class="form-group>">

	<label for="email">Email</label>
	<input class="form-control" type="email" name="email" required/>
	</div>
	<div class="form-group>">

	<label for="password">Contraseña</label>
	<input class="form-control" type="password" name="password" required/>
	</div>
	
	<input type="submit" value="Registrarse" />
</form>