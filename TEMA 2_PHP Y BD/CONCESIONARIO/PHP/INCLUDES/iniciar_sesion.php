<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>

<body>
<div class="contenedor">
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>

<div class="formularioregistro">
<h2 class="registro-header">Inicia sesión o regístrate</h2>
<form class="sign-up" action="iniciar_sesion.php">

<label for="usuario">Usuario</label>
<input name="usuario" type="text">
<label for="password">Contraseña</label>
<input type="password" name="password">
<input type="submit" value="Iniciar sesión" name="submit"/>
</form>
<form class="sign-in" action="iniciar_sesion.php">
<label for="usuario">Usuario</label>
<input name="usuario" type="text">
<label for="nombre">Nombre</label>
<input name="nombre" type="text">
<label for="password">Contraseña</label>
<input type="password" name="password">
<input type="submit" value="Registrarme" name="submit"/>
</div>

<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>