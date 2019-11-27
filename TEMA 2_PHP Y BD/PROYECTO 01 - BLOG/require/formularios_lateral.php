<div class="lateral">
<?php require_once "require/form_buscar.php"?>


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
    <?php if (isset($_SESSION['errores']) && isset($_POST["submitlogin"])) {
            if (count($_SESSION['errores']) > 0) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                echo "<div class='mensajes warning'>$error</div>";
                }
            }
            unset($_SESSION['errores']);
        }
    
    ?>

    <div class="lat1">
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

<?php 

$_SESSION['errores'] = Array();

if (isset($_SESSION['errores']) && isset($_POST["submitregistro"])) {
            if (count($_SESSION['errores']) > 0) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                echo "<div class='mensajes warning'>$error</div>";
                }
            }
        }
    
    ?>

