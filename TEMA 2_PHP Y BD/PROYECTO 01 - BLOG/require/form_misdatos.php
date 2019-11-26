<?php 

if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}

$id = $_SESSION['id'];

$sql = "SELECT nombre,apellidos,email,password FROM usuarios WHERE id=$id";
$resultado= mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)>0) {
    while ($fila= mysqli_fetch_assoc($resultado) ){
        $nombre = $fila['nombre'];
        $apellidos = $fila['apellidos'];
        $correo = $fila['email'];
        $password = $fila['password'];
    }
}

?>

<form method="post" action="mis_datos.php">
        <label for="nombre">Nombre</label>
        <input name="nombre" value=<?php echo $nombre?> type="text">
        <label for="apellidos">Apellidos</label>
        <input name="apellidos" value=<?php echo $apellidos?> type="text">
        <label for="correo">Correo</label>
        <input name="correo" value=<?php echo $correo?> type="email">
        <label for="password1">Nueva contraseña</label>
        <input type="password" name="password1">
        <input type="hidden" value=<?php echo $password?> name="password2">
        <input type="submit" value="Actualizar" name="submitdatos">
        <button formaction="index.php">Volver</button>
</form>

<?php if (isset($_SESSION['errores']) && isset($_POST["submitdatos"])) {
            if (count($_SESSION['errores']) > 0) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                echo "<div class='mensajes warning'>$error</div>";
                }
            }
            unset($_SESSION['errores']);
        }

        if (isset($_SESSION['exito']) && isset($_POST["submitdatos"])) {
            if (count($_SESSION['exito']) > 0) {
                $exitos = $_SESSION['exito'];
                foreach ($exitos as $exito) {
                echo "<div class='mensajes success'>$exito</div>";
                }
            }
            unset($_SESSION['exito']);
        }
    
    ?>