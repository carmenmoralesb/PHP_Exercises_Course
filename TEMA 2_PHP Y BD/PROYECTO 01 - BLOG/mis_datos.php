<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bedstead" type="text/css"/>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/now" type="text/css"/>
</head>

<body>

<div id="contenedor">

<?php require_once 'includes/conecta.php';?>
<?php include 'includes/header.php';?>

<div id="central">
<div class="encabezado">
<h2>Modificar mis datos</h2>
</div>
<?php require_once "require/form_misdatos.php"?>

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
        $password_segura = password_hash($nuevacontrasena, PASSWORD_BCRYPT, ['cost'=>4]);
    }

    else {
        $password_segura = $password_antigua;
    }


    if (count($errores)==0) {
        $sql = "UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',email='$correo',password='$password_segura'
                WHERE id=$id"; 
        $result = mysqli_query($conexion,$sql);

        
        if ($result) {
            //header("Location: index.php");
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidos'] = $apellidos;
            $_SESSION['correo'] = $correo;
            $_SESSION['password'] = $password_segura;

            $exito['exito'] = 'Credenciales cambiadas con éxito';

            //var_dump($_SESSION['mensajesexito']);
        }
    }


    $_SESSION['errores'] = $errores;
    $_SESSION['exito'] = $exito;
}

?>

</div>

<?php 
//var_dump($sql);

require_once "require/forms_panel.php";
?>

<?php include 'includes/footer.php';?>

</div>
</body>
</html>