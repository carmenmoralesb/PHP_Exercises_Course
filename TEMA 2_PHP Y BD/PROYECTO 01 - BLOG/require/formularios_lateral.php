<div class="lateral">
<div class="lat1">
<h2 align="center" class="cabeform">Búsqueda</h2>
<form>
<label for="buscar">Buscar</label>
<input type="text" placeholder="RPG,indie ...">
<input type="submit" value="Buscar" name="submitbuscar"/>
</form>
</div>
    <div class="lat1">
    <h2 align="center" class="cabeform">Iniciar sesión</h2>
    <form method="post" action="index.php">
        <label for="correo">E-mail</label>
        <input name="correo" type="email">
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        <input type="submit" value="Iniciar sesión" name="submitlogin"/>
    </form>
    </div>

    <div class="lat2">
    <h2 align="center" class="cabeform">Registro</h2>
        <form class="sign-in" method="post" action="index.php">
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text">
        <label for="apellidos">Apellidos</label>
        <input name="apellidos" type="text">
        <label for="correo">Correo</label>
        <input name="correo" type="email">
        <label for="password1">Contraseña</label>
        <input type="password" name="password1">
        <label for="password2">Repite la contraseña</label>
        <input type="password" name="password2">
        <input type="submit" value="Registrarme" name="submitregistro"/>
    </form>
</div>
</div>