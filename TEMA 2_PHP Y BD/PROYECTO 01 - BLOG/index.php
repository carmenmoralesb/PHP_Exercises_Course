<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bedstead" type="text/css"/>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/now" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
</head>

<body>    
<div id="contenedor">

<?php require_once 'includes/conecta.php';?>
<?php include 'includes/header.php';?>

<div id="central">
<div class="encabezado">
<h2>Últimas entradas</h2>

</div>
<?php
$sql= "SELECT entradas.fecha AS entrada_fecha, entradas.id AS entrada_id,titulo,descripcion,usuarios.nombre AS usunombre,categorias.nombre,usuario_id FROM entradas INNER JOIN usuarios ON entradas.usuario_id = usuarios.id 
       INNER JOIN categorias ON entradas.categoria_id = categorias.id
       ORDER BY entrada_fecha asc";

$resultado= mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado)>0) {
    while ($fila= mysqli_fetch_assoc($resultado)) {
          $id = $fila['entrada_id'];
          $autor = $fila['usunombre'];
          $titulo = $fila['titulo'];
          $fecha = $fila['entrada_fecha'];
          // sustraigo parte de la descripcion para ver una vista previa de la entrada
          $descripcion = substr($fila['descripcion'],0,600);
?>

<section>
    <img src="imagenes/entrada.png">
    <div class="cabecera_entrada">
    <h2><?php echo $fila['titulo']?></h2>
    
    <?php 
    // si la sesion id está seteada es porque el usuario está logueado, nos queda por ver
    // si el usuairo es el mismo que el autor de la entrada, si lo es aparecen los iconos
    // de edicion
    if  (isset($_SESSION['id']) && $_SESSION['id']==$fila['usuario_id']) {?>
    <a href="borrar_entrada.php?id_entrada=<?php ECHO $id ?>">
    <i class="fas fa-minus-square"></i></a>
    <a href="editar_entrada.php?id_entrada=<?php ECHO $id ?>">
    <i class="fas fa-pen-square"></i></a>
    <?php }?>
    </div>
    <h3><?php echo $fecha ?></h3>
    <article>
    <h4>Autor: <?php echo $autor ?></h4>
    <p><?php echo $descripcion ?></p>
    <a><button>Leer más</button></a>
</article>
</section>
    <?php } 
}?>
</div>
<?php 

if (!(isset($_SESSION['nombre']))) {
$erroreslogin = Array();
$erroresregistro = Array();
$mensajesexito = Array();

require_once 'require/formularios_lateral.php';

if (isset($_POST["submitlogin"])) {
    $email = $_POST["correo"]? mysqli_real_escape_string($conexion, trim ($_POST['correo'])) : false;
    $contrasena = $_POST["password"]? mysqli_real_escape_string($conexion, trim ($_POST['password'])) : false;

    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $existe = mysqli_query($conexion,$consulta);
    $verificar = false;

    if (empty($email)) {
        $erroreslogin['email'] = "No puedes dejar el email vacio";
      }
  
    if (empty($contrasena)) {
        $erroreslogin['contrasena'] = "Escribe una contraseña";
      }
      

    if ($existe) 
    {
        while ($fila= mysqli_fetch_assoc($existe)){
                $id = $fila['id'];
                $nombre = $fila['nombre'];
                $correo = $fila['email'];
                $verificar = password_verify($contrasena, $fila['password']);
            }
            
            if (count($erroreslogin)==0 && $verificar) {
                // si todo esto se cumple el usuario ha podido iniciar sesion correctamente
                // y se crea las variables de usuario de SESSION
                $_SESSION['nombre'] = $nombre;
                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = $id;
                header("location: index.php");
            }
            else {
                $erroreslogin["contraseña incorrecta"] = 'Esa contraseña no es correcta';
            }
        }
    else {
        $erroreslogin["usuario no válido"] = 'Ese usuario no existe';
    }
    $_SESSION['errores'] = $erroreslogin;

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
                VALUES ('$nombre','$apellidos','$correo','$password_segura',curdate())";

        $result = mysqli_query($conexion,$sql);

        if ($result) {
          $_SESSION['nombre'] = $usuario;
          $_SESSION['correo'] = $correo;
          header("Location: index.php");
        }
    }
    $_SESSION['errores'] = $erroresregistro;
    }
    }
}

// si el id de SESSION está seteado es porque hay un usuario logueado, asi que
// muestro el panel lateral con las opciones de creación

else {
    // si el usuario está logueado
    $correo = $_SESSION['correo'];
    $nombre = $_SESSION['nombre'];
    // se setean las variables de error
    $_SESSION['errores'] = Array();
    $_SESSION['exito'] = Array();
    
    // selecciono el id para guardarlo en otra variable ya que es útil para
    // por ej la edicion de entradas y la creacion
    $consulta = "SELECT id FROM usuarios WHERE email = '$correo' AND nombre='$nombre'";
    //var_dump($consulta);
    $existe = mysqli_query($conexion,$consulta);
    
    //var_dump($existe);

    if (mysqli_num_rows($existe)>0) {
        while ($fila= mysqli_fetch_assoc($existe)) {
            $idusuario = $fila['id'];
            //var_dump($fila['id']);
    }
    $_SESSION['id'] = $idusuario;
    //var_dump($_SESSION['id']);
    require_once "require/forms_panel.php";

}
}
?>
</div>

<?php include 'includes/footer.php';?>

</div>
</body>
</html>