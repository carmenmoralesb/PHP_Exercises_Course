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
<?php require_once "require/form_categoria.php"?>

<?php

$errores = Array();

if(isset($_POST["submitcategoria"])){
    
    $nombre = $_POST['nombre']? mysqli_real_escape_string($conexion, trim ($_POST['nombre'])) : false;
    //var_dump($nombre);

    $sql2 = "SELECT nombre FROM categorias WHERE nombre='$nombre'";
    $resultado = mysqli_query($conexion,$sql2);

    //var_dump($sql2);
    //var_dump($resultado);

    
    if (empty($nombre)) {
        $errores['nombre'] = "Error, escribe un titulo";
      }

    else if (mysqli_num_rows($resultado)>0) {
        $errores['existe'] = 'Esa categoría ya existe';
      }  
    
    if (count($errores)==0) {
        $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre')"; 
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