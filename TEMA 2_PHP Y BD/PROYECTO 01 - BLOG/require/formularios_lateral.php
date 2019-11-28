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

<?php 

if (isset($_POST["submitlogin"])) {
    $errores = Array();

    $email = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $contrasena = $_POST["password"]? mysqli_real_escape_string($conexion, trim ($_POST['password'])) : false;

    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $existe = mysqli_query($conexion,$consulta);
    $verificar = false;

    if (empty($email)) {
       $errores['email'] = "No puedes dejar el email vacio";
      }
  
    if (empty($contrasena)) {
       $errores['contrasena'] = "Escribe una contraseña";
      }
      

    if ($existe) 
    {
        while ($fila= mysqli_fetch_assoc($existe)){
                $id = $fila['id'];
                $nombre = $fila['nombre'];
                $correo = $fila['email'];
                $verificar = password_verify($contrasena, $fila['password']);
            }

            if (!$verificar) {
               $errores['contraseña no valida'] = "contraseña incorrecta";
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
                $_SESSION['nombre'] = $nombre;
                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = $id;
                header("location: index.php");
            }
        }
    $_SESSION['errores'] =$errores;
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
        <input type="submit" value="Registrarme" name="submitregistro">
    </form>
</div>

<?php 

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
       $errores['nombre'] = "Error, escribe un nombre";
      }
  
      if (empty($correo)) {
       $errores['correo'] = "Error, escribe un correo";
      }

      if (empty($contrasena) || empty($contrasena2)) {
       $errores['contrasenavacia'] = "Escribe una contrasena";
      }
  
      if ($contrasena != $contrasena2 ) {
       $errores['contrasena'] = "Error, las contrasenas no coinciden";
      }

    //var_dump($nombre);
    //var_dump($contrasena);

    $consulta2 = "SELECT * FROM usuarios WHERE email = '$correo'";
    //var_dump($consulta2);
    $existe2 = mysqli_query($conexion,$consulta2);
    //var_dump($existe2);

    if (mysqli_num_rows($existe2)>0) {
       $errores["usuario"] = "Ese usuario ya existe";
    }

    if (count($errores)>0) {
        $_SESSION['errores'] = $errores;
        $errores = $_SESSION['errores'];
        foreach ($errores as $error) {
            echo "<div class='mensajes error'>$error</div>";
          }
        $_SESSION['errores'] = Array();
      }

    else {

        $sql = "INSERT INTO usuarios (nombre,apellidos,email,password,fecha) 
                VALUES ('$nombre','$apellidos','$correo','$password_segura',curdate())";

        $result = mysqli_query($conexion,$sql);

        if ($result) {
          $_SESSION['nombre'] = $nombre;
          $_SESSION['correo'] = $correo;
          header("Location: index.php");
        }
    }
    $_SESSION['errores'] =$errores;
    }

?>

