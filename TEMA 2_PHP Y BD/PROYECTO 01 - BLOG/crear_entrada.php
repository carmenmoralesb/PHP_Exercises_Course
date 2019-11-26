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
<h2>Crear una entrada</h2>
</div>
<?php require_once "require/form_entrada.php"?>

<?php

$errores = Array();

if(isset($_POST["submitentrada"])){
    
    $titulo = $_POST['titulo']? mysqli_real_escape_string($conexion, trim ($_POST['titulo'])) : false;
    $categoria =  $_POST['categoria'];
    $descripcion = $_POST['descripcion']? mysqli_real_escape_string($conexion, trim ($_POST['descripcion'])) : false;
    
    $correo = $_SESSION['correo']; 

    $sql2 = "SELECT id FROM usuarios WHERE email='$correo'";
    $resultado = mysqli_query($conexion,$sql2);

    if (mysqli_num_rows($resultado)>0) {
      while ($fila= mysqli_fetch_assoc($resultado)) {
        $idusuario = $fila['id'];
      }  
    }

    $sql3 = "SELECT id FROM categorias WHERE nombre='$categoria'";
    $resultado2 = mysqli_query($conexion,$sql3);
    //var_dump($sql3);
    //var_dump($resultado2);

    if (mysqli_num_rows($resultado2)>0) {
      while ($fila= mysqli_fetch_assoc($resultado2)) {
        $idcat = $fila['id'];
        //var_dump($idcat);
      }  
    }

    if (empty($titulo)) {
      $errores['titulo'] = "Error, escribe un titulo";
    }

    if (empty($descripcion)) {
      $errores['descripcion'] = "Error, escribe una descripcion";
    }

    else {
      $sql = "INSERT INTO entradas (titulo,usuario_id,descripcion,categoria_id,fecha) 
      VALUES ('$titulo',$idusuario,'$descripcion',$idcat,curdate())";
      $result = mysqli_query($conexion,$sql);

      if ($result) {
        header("Location: index.php");
      }
    }
    $_SESSION['errores'] = $errores;
  }
?>

</div>

<?php 
require_once "require/forms_panel.php";
?>

<?php include 'includes/footer.php';?>

</div>
</body>
</html>