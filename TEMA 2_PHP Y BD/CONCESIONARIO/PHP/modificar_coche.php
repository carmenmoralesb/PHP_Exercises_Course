<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<!-- SECCIÓN BODY -->

<body>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>

<?php require_once 'INCLUDES/conecta.php';?>

<div class="contenido">
<div class="formulario">
<?php

$ident = $_GET["id"];
$consulta = "SELECT * FROM coche WHERE id = $ident";
$existe = mysqli_query($conexion,$consulta);

if (mysqli_num_rows($existe)>0) {
    while ($fila= mysqli_fetch_assoc($existe) ){
        $marca = $fila['marca'];
        $modelo = $fila['modelo'];
        $precio = $fila['precio'];
        $stock = $fila['stock'];
    }
    ?>
    <h2 align="center" class="cabeform">Modifica el vehículo</h2>
    <form action="modificar_coche.php" method="post"> 
        <label for="id">ID</label>
        <input type="number" value=<?php ECHO $_GET["id"] ?> name="id">
        <label for="modelo">Modelo</label>
        <input type="text" value=<?php ECHO $modelo ?> name="modelo">
        <label for="marca">Marca</label>
        <input type="text" value=<?php ECHO $marca ?> name="marca">
        <label for="precio">Precio</label>
        <input type="number" value=<?php ECHO $precio ?> name="precio">
        <label for="stock">Stock</label>
        <input type="number" value=<?php ECHO $stock ?> name="stock">
        <input type="submit" value=" Enviar " name="submit2">
        </form>
    <?php
}

    else {

        ?>
        <div class="mensajes error">No existe</div>
    </div>

    <?php
    }

?>

<?php 

if(isset($_POST["submit2"])) {
    $id = $_POST["id"];
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql = "UPDATE coche SET modelo='$modelo',marca='$marca',precio=$precio,stock=$stock
            WHERE id=$id";
    $result = mysqli_query($conexion,$sql);
    var_dump($sql);
    var_dump($result);

    if ($result) {
        header("Location: listar_coches.php");
    }
}

echo "</div>";
?>
</div>
</div>
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>