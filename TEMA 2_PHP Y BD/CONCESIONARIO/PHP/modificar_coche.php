<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></head>
</head>

<!-- SECCIÓN BODY -->

<body>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>

<?php require_once 'INCLUDES/conecta.php';?>

<div class="contenido">
<div class="formulario">
<?php

$erroresformulario = Array();

if (isset($_GET['id'])) {
    $ident = $_GET["id"];
}

else {
    $ident = null;
}

$consulta = "SELECT * FROM coche WHERE id = $ident";
$existe = mysqli_query($conexion,$consulta);

if (mysqli_num_rows($existe)>0) {
    while ($fila= mysqli_fetch_assoc($existe) ){
        $marca1 = $fila['marca'];
        $id = $fila['id'];
        $modelo1 = $fila['modelo'];
        $precio1 = $fila['precio'];
        $stock1 = $fila['stock'];
    }

    
    ?>

    <h2 align="center" class="cabeform">Modifica el vehículo</h2>

    <form action="modificar_coche.php" method="post"> 
        <label for="id">ID</label>
        <input type="number" value=<?php ECHO $id ?> name="id">
        <label for="modelo">Modelo</label>
        <input type="text" value=<?php ECHO $modelo1 ?> name="modelo">
        <label for="marca">Marca</label>
        <input type="text" value=<?php ECHO $marca1 ?> name="marca">
        <label for="precio">Precio</label>
        <input type="number" value=<?php ECHO $precio1 ?> name="precio">
        <label for="stock">Stock</label>
        <input type="number" value=<?php ECHO $stock1 ?> name="stock">
        <input type="submit" value=" Enviar " name="submit2">
        </form>
    <?php
}

if(isset($_POST["submit2"])) {
    $id = $_POST["id"];
    $modelo = $_POST["modelo"] ? mysqli_real_escape_string($conexion, trim ($_POST['modelo'])) : false;
    $marca = $_POST["marca"] ? mysqli_real_escape_string($conexion, trim ($_POST['modelo'])) : false;
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    if (empty($modelo)) {
        $erroresformulario['modelo'] = "No puedes dejar el modelo vacío";

      }
  
      if (empty($marca)) {
        $erroresformulario['marca'] = "No puedes dejar la marca vacía";

      }

      if (empty($precio)) {
        $erroresformulario['precio'] = "No puedes dejar el precio vacio";
      }
  
      if (empty($stock)) {
        $erroresformulario['stock'] = "No puedes dejar el stock vacío";
      }

    $sql = "UPDATE coche SET modelo='$modelo',marca='$marca',precio=$precio,stock=$stock
            WHERE id=$id";
    $result = mysqli_query($conexion,$sql);

    if (count($erroresformulario==0)) {
        if ($result) {
            header("Location: listar_coches.php");
        }

    else {
        foreach ($erroresformulario as $error) {
            echo "<div class='mensajes error'>$error</div>";
        }
    }
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