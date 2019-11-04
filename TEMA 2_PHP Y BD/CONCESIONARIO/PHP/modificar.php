<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>
<div class='contenedor'>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>
<body>
<?php include 'INCLUDES/header.php';?>
<main class="contenido">

<?php require_once 'INCLUDES/conecta.php';?>

<form action="modificar.php" method="post"> 
    <label>Identificador</label>
    <input type="text" name="ident">
<input type="submit" value=" Enviar " name="submit">
</form>

<?php
if(isset($_POST["submit"])){
    $ident = $_POST["ident"];
    $sql = "select * from coche where id='".$ident."'";
    $resultado= mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado)>0){
        ?>
<table>
<tr><th>Coches del concesionario</th>
<th>Marca</th>
<th>Modelo</th>
<th>Precio</th>
<th>Stock</th>
</tr>
<?php 
while ($fila= mysqli_fetch_assoc($resultado) ){?>
<tr><td><?= $fila['id']?></td>
<td><?= $fila['marca']?></td>
<td><?= $fila['modelo']?></td>
<td><?= $fila['precio']?></td>
<td><?= $fila['stock']?></td></tr>
</table>
<?php
}
}else{
echo '0 Registros';}
}
?>
<form action="modificar.php" method="post"> 
    <label>Modelo</label>
    <input type="text" name="modelo">
    <label>Marca</label>
    <input type="text" name="marca">
    <label>Precio</label>
    <input type="number" name="precio">
    <label>Stock</label>
    <input type="number" name="stock">
    <input type="submit" value=" Enviar " name="submit2">
</form>
<br>
<br>
<?php 

if(isset($_POST["submit2"])){
    $ident = $_POST["ident"];
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql = "UPDATE coche SET modelo=.$modelo.,marca=.$marca.,precio=$precio.,stock=$stock
            WHERE id=$ident";
    $result = mysqli_query($conexion,$sql);
    var_dump($result);
}
?>
</main>
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>