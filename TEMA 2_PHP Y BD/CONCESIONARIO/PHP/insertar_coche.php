<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>
<?php require_once 'INCLUDES/conecta.php';?>

<div class="contenido">
<div class="formulario">
<h2 align="center" class="cabeform">Añadir un coche</h2>
<form action="insertar_coche.php" method="post"> 
<label for="modelo">Modelo</label>
<input type="text" placeholder="Porsche" name="modelo">
<label for="marca">Marca</label>
<input type="text" placeholder="Porsche Cayenne" name="marca">
<label for="precio">Precio</label>
<input type="number" placeholder="€" name="precio">
<label for="marca">Stock</label>
<input type="stock" placeholder="Cantidad de coches" name="stock">
<input type="submit" value=" Enviar " name="submit"/>
</form>

<?php 
if(isset($_POST["submit"])){
    
    $modelo = $_POST['modelo']? mysqli_real_escape_string($conexion, trim ($_POST['nombre'])) : false;
    $marca =  $_POST['marca']? mysqli_real_escape_string($conexion, trim ($_POST['marca'])) : false;
    $precio = $_POST['precio'];
    $stock =  $_POST['stock'];

    $errores = Array();

    if (empty($modelo)) {
      $errores['modelo'] = "Error, escribe un modelo";
    }

    if (empty($marca)) {
      $errores['marca'] = "Error, escribe un marca";
    }

    if (empty($precio)) {
      $errores['precio'] = "Error, escribe un precio";
    }

    
    if (empty($stock)) {
      $errores['stock'] = "Error, escribe el stock";
    }

    if (count($errores) > 0) {
      foreach ($errores as $error){
        echo "<div class='mensajes error'>$error</div>";
        }
    }

    else {
      $sql = "INSERT INTO coche (modelo,marca,precio,stock) VALUES ('$modelo','$marca',$precio,$stock)";
      $result = mysqli_query($conexion,$sql);
      var_dump($sql);
      
      if ($result) {
        header("Location: listar_coches.php");
      }
    }
  }
?>
</div>
</div>
<?php include 'INCLUDES/footer.php';?>
</body>
</html>