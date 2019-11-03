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

<form action="borrar.php" method="post"> 
    <label>Id del coche</label>
    <input type="text" name="id">
    <input type="submit" value=" Enviar " name="submit"/>

</form>
<?php 

if(isset($_POST["submit"])){
    $id = "id";

    $sql = "DELETE FROM coche WHERE id = ('".$_POST["id"]."')";
    $result = mysqli_query($conexion,$sql);
    var_dump($result);
}
?>
</main>
<?php include 'footer.php';?>
</div>
</body>
</html>