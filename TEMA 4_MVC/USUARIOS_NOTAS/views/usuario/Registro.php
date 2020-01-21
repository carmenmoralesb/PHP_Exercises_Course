<h1>Registrarse</h1>

<?Utils::mostrarError('register'); ?>

<form action="index.php?c=Usuarios&a=save" method="POST">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required />

<label for="apellidos">Apellidos</label>
<input type="text" name="apellidos" required />

<label for="email">Email</label>
<input type="email" name="email" required/>

<label for="password">Contraseña</label>
<input type="password" name="password" required/>

<input type="submit" name="registro" value="Registrarse" />
</form>