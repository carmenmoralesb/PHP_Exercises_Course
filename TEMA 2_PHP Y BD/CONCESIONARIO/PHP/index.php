<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>

<body>
<div class="contenedor">
<?php include 'INCLUDES/header.php';?>
<?php require_once 'INCLUDES/conecta.php';?>

<div class="formularioregistro">
<h2 class="registro-header">Inicia sesión o regístrate</h2>
<form class="sign-up" method="post" action="index.php">

<label for="correo">E-mail</label>
<input name="correo" type="email">
<label for="password">Contraseña</label>
<input type="password" name="password">
<input type="submit" value="Iniciar sesión" name="submitlogin"/>
</form>

<?php

session_start();

$erroreslogin = Array();
$erroresregistro = Array();

if (isset($_POST["submitlogin"])) {
    $email = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $contrasena = $_POST["password"]? mysqli_real_escape_string($conexion, trim ($_POST['password'])) : false;
    
    //var_dump($nombre);
    var_dump($contrasena);

    $consulta = "SELECT * FROM usuarios WHERE correo = '$email'";
    $existe = mysqli_query($conexion,$consulta);
    //var_dump($existe);

    if (mysqli_num_rows($existe)>0) {
        while ($fila= mysqli_fetch_assoc($existe) ){
            $nombre = $fila['nombre'];
            $correo = $fila['correo'];
            $verificar = password_verify($contrasena, $fila[ 'contrasena']);
            //var_dump($verificar);
        }

        if (count($erroreslogin)==0 && $verificar==true) {
            //session_regenerate_id();
            $_SESSION['uname'] = $nombre;

            echo 'Bienvenido ' . $_SESSION['uname'] . '!';
            header("location: listar_coches.php");
        }

    else {
        foreach ($erroreslogin as $error) {
            echo "<div class='mensajes warning'>Ese usuario no está creado</div>";
        }
    }
}

    else {
        $erroreslogin["usuario"] = "No existe el usuario";
    }
}
?>

<form class="sign-in" method="post" action="index.php">
<label for="nombre">Nombre</label>
<input name="nombre" type="text">
<label for="apellidos">Apellidos</label>
<input name="apellidos" type="text">
<label for="correo">Correo</label>
<input name="correo" type="email">
<label for="direccion">Dirección</label>
<input name="direccion" type="text">
<label for="edad">Edad</label>
<input name="edad" type="number">
<label for="password1">Contraseña</label>
<input type="password" name="password1">
<label for="password2">Repite la contraseña</label>
<input type="password" name="password2">
<input type="submit" value="Registrarme" name="submitregistro"/>
</div>

<?php

if (isset($_POST["submitregistro"])) {
    $nombre = $_POST["nombre"]? mysqli_real_escape_string($conexion, trim ($_POST['nombre'])) : false;
    $apellidos = $_POST["apellidos"]? mysqli_real_escape_string($conexion, trim ($_POST['apellidos'])) : false;
    $correo = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $edad = $_POST["edad"];
    $direccion = $_POST["direccion"]? mysqli_real_escape_string($conexion, trim ($_POST['direccion'])) : false;
    $contrasena = $_POST["password1"]? mysqli_real_escape_string($conexion, trim ($_POST['password1'])) : false;
    $contrasena2 = $_POST["password2"]? mysqli_real_escape_string($conexion, trim ($_POST['password2'])) : false;

    $password_segura = password_hash($contrasena, PASSWORD_BCRYPT, ['cost'=>4]);

    //var_dump($password_segura);

    // ERRORES

    if (empty($nombre)) {
        $erroresregistro['nombre'] = "Error, escribe un nombre";
      }
  
      if (empty($correo)) {
        $erroresregistro['correo'] = "Error, escribe un correo";
      }

      if (empty($contrasena) || empty($contrasena2)) {
        $erroresregistro['contrasenavacia'] = "Escribe una contrasena";
      }
  
      if ($contrasena != $contrasena2 ) {
        $erroresregistro['contrasena'] = "Error, las contrasenas no coinciden";
      }

    //var_dump($nombre);
    //var_dump($contrasena);

    $consulta2 = "SELECT * FROM usuarios WHERE correo = '$correo'";
    //var_dump($consulta2);
    $existe2 = mysqli_query($conexion,$consulta2);
    //var_dump($existe2);

    if (mysqli_num_rows($existe2)>0) {
        $erroresregistro["usuario"] = "Ese usuario ya existe";
    }


    else {
        var_dump(count($erroresregistro));
        if (count($erroresregistro)==0) {
        echo "he llegaooo";

        $sql = "INSERT INTO usuarios (nombre,apellidos,correo,edad,contrasena,dirección) 
                VALUES ('$nombre','$apellidos','$correo',$edad,'$password_segura','$direccion')";

        var_dump($sql);
        $result = mysqli_query($conexion,$sql);

        if ($result) {
          header("Location: listar_coches.php");
        }
    }
        else {
            foreach ($erroresregistro as $error) {
                echo "<div class='mensajes warning'>$error</div>";
            }
        }
    }
}

?>
</div>
</div>
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>