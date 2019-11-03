<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="estilo.css" type="text/css" rel="stylesheet">
</head>
<div class='contenedor'>
<?php include 'header.php';?>
<?php include 'nav.php';?>
<body>
<?php include 'header.php';?>
<main class="contenido">
<?php require_once 'conecta.php';?>

<form action="insertar.php" method="post"> 
    <label>Modelo</label>
    <input type="text" name="modelo">
    <label>Marca</label>
    <input type="text" name="marca">
    <label>Precio</label>
    <input type="number" name="precio">
    <label>Stock</label>
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
<?php include 'footer.php';?>
</div>
</body>
</html>