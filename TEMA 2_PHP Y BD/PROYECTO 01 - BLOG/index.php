<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>

<body>    
<div id="contenedor">

<?php require_once 'includes/conecta.php';?>
<?php include 'includes/header.php';?>

<div id="central">
<div class="encabezado">
<h2>Últimas entradas</h2>
</div>

<section>
    <img src="imagen.html"><h3>Entrada 1 - Análisis de videojuego</h3>
    <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequuntur voluptatibus numquam at vitae tempora facilis 
        laborum modi quis rem iure voluptates, qui eligendi obcaecati earum 
        totam nostrum ex deserunt.</article>
</section>

<section>
    <img src="imagen.html">
    <h3>Entrada 1 - Análisis de videojuego</h3>
    <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequuntur voluptatibus numquam at vitae tempora facilis 
        laborum modi quis rem iure voluptates, qui eligendi obcaecati earum 
        totam nostrum ex deserunt.</article>
</section>

<section>
    <img src="imagen.html">
    <h3>Entrada 1 - Análisis de videojuego</h3>
    <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequuntur voluptatibus numquam at vitae tempora facilis 
        laborum modi quis rem iure voluptates, qui eligendi obcaecati earum 
        totam nostrum ex deserunt.</article>
</section>

<section>
    <img src="imagen.html">
    <h3>Entrada 1 - Análisis de videojuego</h3>
    <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequuntur voluptatibus numquam at vitae tempora facilis 
        laborum modi quis rem iure voluptates, qui eligendi obcaecati earum 
        totam nostrum ex deserunt.</article>
</section>
</div>

<?php 

if (!(isset($_SESSION['usuario']))) {
$erroreslogin = Array();
$erroresregistro = Array();

require_once 'require/formularios_lateral.php';

if (isset($_POST["submitlogin"])) {
    $email = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $contrasena = $_POST["password"]? mysqli_real_escape_string($conexion, trim ($_POST['password'])) : false;

    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $existe = mysqli_query($conexion,$consulta);

    if (empty($email)) {
        $erroreslogin['email'] = "No puedes dejar el email vacio";
      }
  
    if (empty($contrasena)) {
        $erroreslogin['contrasena'] = "Escribe una contraseña";
      }
      

    if ($existe) 
    {
        while ($fila= mysqli_fetch_assoc($existe) ){
                $nombre = $fila['nombre'];
                $correo = $fila['email'];
                $verificar = password_verify($contrasena, $fila['password']);
            }
            
            if (count($erroreslogin)==0 && $verificar==true) {
                $_SESSION['usuario'] = $nombre;
                header("location: index.php");
            }
            else {
                $erroreslogin["contraseña incorrecta"] = 'Esa contraseña no es correcta';
            }
        }
    else {
        echo "<div class='mensajes warning'>Ese usuario no existe</div>";
    }

    if (count($erroreslogin) > 0) {
        foreach ($erroreslogin as $error) {
            echo "<div class='mensajes warning'>$error</div>";
        }
    }
}

if (isset($_POST["submitregistro"])) {
    $nombre = $_POST["nombre"]? mysqli_real_escape_string($conexion, trim ($_POST['nombre'])) : false;
    $correo = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $apellidos = $_POST["apellidos"]? mysqli_real_escape_string($conexion, trim ($_POST['apellidos'])) : false;
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

    $consulta2 = "SELECT * FROM usuarios WHERE email = '$correo'";
    //var_dump($consulta2);
    $existe2 = mysqli_query($conexion,$consulta2);
    //var_dump($existe2);

    if (mysqli_num_rows($existe2)>0) {
        $erroresregistro["usuario"] = "Ese usuario ya existe";
    }


    else {
        if (count($erroresregistro)==0) {

        $sql = "INSERT INTO usuarios (nombre,apellidos,email,password,fecha) 
                VALUES ('$nombre','$apellidos','$correo','$password_segura',now())";

        var_dump($sql);
        $result = mysqli_query($conexion,$sql);
        var_dump($result);

        if ($result) {
          session_start();
          $_SESSION['usuario'] = $correo;
          header("Location: index.php");
        }
    }
        else {
            foreach ($erroresregistro as $error) {
                echo "<div class='mensajes warning'>$error</div>";
            }
        }
    }
}
}

else {
    require_once "require/forms_panel.php";
}

include 'includes/footer.php';?>

</div>
</body>
</html>