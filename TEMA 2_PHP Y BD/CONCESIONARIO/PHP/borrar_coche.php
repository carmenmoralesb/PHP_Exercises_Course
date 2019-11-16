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
<?php 

    $id = intval($_GET["id"]);
    $sql = "DELETE FROM coche WHERE id = $id";
    $resultado = mysqli_query($conexion,$sql);
    
    if ($resultado) {
        header("Location: listar_coches.php");
    }

    else {
        echo "<div class='mensajes error'>
              No se ha podido borrar</div>";
    }
    ?>
</div>
<?php include 'INCLUDES/footer.php';?>
</body>
</html>