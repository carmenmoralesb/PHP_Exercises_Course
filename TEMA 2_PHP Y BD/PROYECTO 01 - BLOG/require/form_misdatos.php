<?php 

if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}

$_SESSION['errores'] = Array();
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
        <label for="password1">Contraseña</label>
        <input type="password" name="password1">
        <input type="hidden" value=<?php echo $password?> name="password2">
        <input type="submit" value="Actualizar" name="submitdatos">
        <button formaction="index.php">Volver</button>
</form>

<?php 

$errores = Array();
$exito = Array();

if(isset($_POST["submitdatos"])){
    
    $nombre = $_POST['nombre']? mysqli_real_escape_string($conexion, trim ($_POST['nombre'])) : false;
    $apellidos = $_POST['apellidos']? mysqli_real_escape_string($conexion, trim ($_POST['apellidos'])) : false;
    $correo = $_POST['correo']? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $nuevacontrasena = $_POST['password1']? mysqli_real_escape_string($conexion, trim ($_POST['password1'])) : false;
    $password_antigua = $_POST['password2']? mysqli_real_escape_string($conexion, trim ($_POST['password2'])) : false;
    //var_dump($sql2);
    //var_dump($resultado);

    
    if (empty($nombre)) {
        $errores['nombre'] = "Error, escribe un nombre";
    }

    if (empty($apellidos)) {
        $errores['apellidos'] = "Error, escribe los apellidos";
    }

    if (empty($correo)) {
        $errores['correo'] = "Error,escribe un correo";
    }

    if (!empty($nuevacontrasena)) {
        // si se deja vacio la contrasena será la misma
        $password_segura = password_hash($nuevacontrasena, PASSWORD_BCRYPT, ['cost'=>4]);
    }

    else {
        $password_segura = $password_antigua;
    }


    if (count($errores)>0) {
        $_SESSION['errores'] = $errores;
        if (count($_SESSION['errores'])>0) {
          $errores = $_SESSION['errores'];
          foreach ($errores as $error) {
            echo "<div class='mensajes error'>$error</div>";
          }
        }
        $_SESSION['errores'] = Array();
    }

    else {
        $sql = "UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',email='$correo',password='$password_segura'
                WHERE id=$id"; 
        $result = mysqli_query($conexion,$sql);

        
        if ($result) {
            //header("Location: index.php");
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidos'] = $apellidos;
            $_SESSION['correo'] = $correo;
            $_SESSION['password'] = $password_segura;

            echo "<div class='mensajes success'>Credenciales cambiadas</div>";

           
            
            //var_dump($_SESSION['mensajesexito']);
        }
    }


    $_SESSION['errores'] = $errores;
}

?>