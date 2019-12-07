<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php include 'INCLUDES/header_sesion.php';?>
<?php require_once 'INCLUDES/conecta.php';?>
<div class="contenido">

<?php
if (isset($_SESSION['usuario'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['contrasena']);
    session_destroy();
}

?>

<div class="formulariologin">
<h2 align="center" class="cabeform">Iniciar sesión</h2>
<form class="sign-up" method="post" action="index.php">
<label for="correo">E-mail</label>
<input name="correo" type="email">
<label for="password">Contraseña</label>
<input type="password" name="password">
<input type="submit" value="Iniciar sesión" name="submitlogin"/>
</form>
<?php


$erroreslogin = Array();
$erroresregistro = Array();

$verificar = null;

if (isset($_POST["submitlogin"])) {
    $email = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $contrasena = $_POST["password"]? mysqli_real_escape_string($conexion, trim ($_POST['password'])) : false;
    
    //var_dump($nombre);

    $consulta = "SELECT * FROM usuarios WHERE correo = '$email'";
    $existe = mysqli_query($conexion,$consulta);
    //var_dump($existe);

    if (empty($email)) {
        $erroreslogin['email'] = "No puedes dejar el email vacio";
      }
  
    if (empty($contrasena)) {
        $erroreslogin['contrasena'] = "Escribe una contraseña";
      }
      
    if (mysqli_num_rows($existe)<0) {
        $erroreslogin["noexiste"] = 'No existe el usuario';
    }

    else 
    {
        while ($fila= mysqli_fetch_assoc($existe) ){
                $nombre = $fila['nombre'];
                $correo = $fila['correo'];
                $verificar = password_verify($contrasena, $fila['contrasena']);
            }
            
            if (count($erroreslogin)==0 && $verificar==true) {
                session_start();
                $_SESSION['usuario'] = $nombre;
                header("location: listar_coches.php");
            }
            else {
                $erroreslogin["contraseña incorrecta"] = 'Esa contraseña no es correcta';
            }
        }

    if (count($erroreslogin) > 0) {
        foreach ($erroreslogin as $error) {
            echo "<div class='mensajes error'>$error</div>";
        }
    }
}
?>
</div>

<div class="formularioregistro">
<h2 align="center" class="cabeform">Registro</h2>
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
</form>
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
        if (count($erroresregistro)==0) {

        $sql = "INSERT INTO usuarios (nombre,apellidos,correo,edad,contrasena,dirección) 
                VALUES ('$nombre','$apellidos','$correo',$edad,'$password_segura','$direccion')";

        var_dump($sql);
        $result = mysqli_query($conexion,$sql);

        if ($result) {
          session_start();
          $_SESSION['usuario'] = $correo;
          header("Location: listar_coches.php");
        }
    }
        else {
            foreach ($erroresregistro as $error) {
                echo "<div class='mensajes error'>$error</div>";
            }
        }
    }
}

?>
</div>
</div>
<?php include 'INCLUDES/footer.php';?>
</body>
</html>