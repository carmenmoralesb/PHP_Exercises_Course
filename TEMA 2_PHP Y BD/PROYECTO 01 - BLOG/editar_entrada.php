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
<h2>Modificar mis datos</h2>
</div>

<?php require_once "require/form_mod_entrada.php"?>

<?php

$errores = Array();
$exito = Array();

//var_dump($id_entrada);

if(isset($_POST["submitmodentrada"])){
    $id_entrada = $_POST['id_entrada'];
    //var_dump($id_entrada);
    $titulo = $_POST['titulo']? mysqli_real_escape_string($conexion, trim ($_POST['titulo'])) : false;
    $descripcion = $_POST['descripcion']? mysqli_real_escape_string($conexion, trim ($_POST['descripcion'])) : false;
    $categoria = $_POST['categoria']? mysqli_real_escape_string($conexion, trim ($_POST['categoria'])) : false;
    
    //var_dump($sql2);
    //var_dump($resultado);

    
    if (empty($titulo)) {
        $errores['titulo'] = "Error, escribe un titulo";
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = "Error, escribe una descripción";
    }

    if (empty($categoria)) {
        $errores['categoria'] = "Error,elige una categoría";
    }

    
    $sql3 = "SELECT id FROM categorias WHERE nombre='$categoria'";
    $resultado2 = mysqli_query($conexion,$sql3);
    //var_dump($resultado2);

    if (mysqli_num_rows($resultado2)>0) {
      while ($fila= mysqli_fetch_assoc($resultado2)) {
        $idcat = $fila['id'];
        //var_dump($idcat);
      }  
    }



    if (count($errores)==0) {
        $sql = "UPDATE entradas SET titulo='$titulo',descripcion='$descripcion',categoria_id=$idcat
                WHERE id=$id_entrada";

        $result = mysqli_query($conexion,$sql);

        
        if ($result) {
            header("Location: index.php");
            //var_dump($_SESSION['mensajesexito']);
        }

        else {
            $errores['error'] = 'No se ha podido modificar';
        }
    }

    $_SESSION['errores'] = $errores;
    $_SESSION['exito'] = $exito;
}

?>
</div>


<?php 
//var_dump($sql);
var_dump($sql3);
require_once "require/forms_panel.php";
?>

<?php include 'includes/footer.php';?>

</div>
</body>
</html>