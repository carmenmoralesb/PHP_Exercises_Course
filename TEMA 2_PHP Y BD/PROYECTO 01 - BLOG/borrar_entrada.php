<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>
<body>

<div id="contenedor">

<?php require_once 'includes/conecta.php';?>
<?php include 'includes/header.php';?>

<div id="central">
<?php 
    $id = intval($_GET["id_entrada"]);

    $sql2 = "SELECT usuario_id FROM entradas WHERE id = $id";
    $resultado2 = mysqli_query($conexion,$sql2);
    
    if (mysqli_num_rows($resultado)>0) {
        while ($fila= mysqli_fetch_assoc($resultado) ){
            $usuario_id = $fila['usuario_id'];
    }
}
    if (!isset($_SESSION['usuario']) || $usuario_id != $_SESSION['id']) {
        header("location: index.php");
    }


    $errores = Array();

    $sql = "DELETE FROM entradas WHERE id = $id";
    $resultado = mysqli_query($conexion,$sql);
    
    if ($resultado && count($errores)==0) {
        //header("Location: index.php");
    }

    else {
        $errores['error'] = 'No se ha podido borrar';
        $errores = $_SESSION['errores'];
        foreach ($errores as $error) {
        echo "<div class='mensajes warning'>$error</div>";
        }
    }
    ?>
</div>
<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>