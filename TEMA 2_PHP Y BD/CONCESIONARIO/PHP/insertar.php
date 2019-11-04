<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class='INCLUDES/contenedor'>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>
<main class="contenido">
<?php require_once 'INCLUDES/conecta.php';?>

<form action="insertar.php" method="post"> 
    <label for="modelo">Modelo</label>
    <input type="text" name="modelo">
    <label for="marca">Marca</label>
    <input type="text" name="marca">
    <label for="precio">Precio</label>
    <input type="number" name="precio">
    <label for="stock">Stock</label>
    <input type="number" name="stock">
    <input type="submit" value=" Enviar " name="submit"/>
</form>
<?php 

if(isset($_POST["submit"])){
    $modelo = "modelo";
    $marca = "marca";
    $precio = "precio";
    $stock = "stock";

    $sql = "INSERT INTO coche (modelo,marca,precio,stock) VALUES ('".$_POST["modelo"]."','".$_POST["marca"]."','".$_POST["precio"]."','".$_POST["stock"]."')";
    $result = mysqli_query($conexion,$sql);
    var_dump($result);
}
?>
</main>
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>