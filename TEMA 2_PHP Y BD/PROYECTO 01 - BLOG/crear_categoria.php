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
<h2>Crear una categoría</h2>
</div>
<?php require_once "require/form_categoria.php"?>

<?php

?>

</div>

<?php 
require_once "require/forms_panel.php";
?>

<?php include 'includes/footer.php';?>

</div>
</body>
</html>