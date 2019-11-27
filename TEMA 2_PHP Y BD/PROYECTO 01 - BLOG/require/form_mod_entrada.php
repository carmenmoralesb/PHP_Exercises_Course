<?php if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}
?>

<?php

$id_entrada = $_GET['id_entrada'];

$sql2 = "SELECT id,titulo,descripcion,categoria_id,fecha FROM entradas WHERE id=$id_entrada";
$resultado2= mysqli_query($conexion, $sql2);
    
if (mysqli_num_rows($resultado2)>0) {
    while ($fila= mysqli_fetch_assoc($resultado2)){
        //$id_entrada = $fila['id'];
        $titulo = $fila['titulo'];
        $descripcion = $fila['descripcion'];
        $categoria = $fila['categoria_id'];
    }
?>
    
<form action="editar_entrada.php?id_entrada=<?php echo $id_entrada?>" method="post"> 
<input type="hidden" value=<?php echo $id_entrada ?> name="id_entrada">
<label for="titulo">Titulo</label>
<input type="text" value=<?php echo $titulo ?> name="titulo">
<label for="descripcion">Descripción</label>
<textarea name="descripcion" style="height:150px;"><?php echo $descripcion?></textarea>
<label for="categoria">Categorías</label>
<select name="categoria" id="categorias">

<?php 

$sql = "SELECT nombre FROM categorias";
$resultado= mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)>0) {
    while ($fila= mysqli_fetch_assoc($resultado) ){
        echo "<option>";
        echo $fila['nombre'];
        echo "</option>";
    }
}

?>
</select>
<input type="submit" value=" Enviar " name="submitmodentrada">
</form>
<?php
}

?>

<?php 

//var_dump($id_entrada);

if(isset($_POST["submitmodentrada"])) {
    $errores = Array();
    $id_entrada = $_POST['id_entrada'];
    //var_dump($id_entrada);
    $titulo = $_POST['titulo']? mysqli_real_escape_string($conexion, trim ($_POST['titulo'])) : false;
    $descripcion = $_POST['descripcion']? mysqli_real_escape_string($conexion, trim ($_POST['descripcion'])) : false;
    $categoria = $_POST['categoria']? mysqli_real_escape_string($conexion, trim ($_POST['categoria'])) : false;
    
    
    $sql3 = "SELECT id FROM categorias WHERE nombre='$categoria'";
    $resultado2 = mysqli_query($conexion,$sql3);
    //var_dump($resultado2);

    if (mysqli_num_rows($resultado2)>0) {
      while ($fila= mysqli_fetch_assoc($resultado2)) {
        $idcat = $fila['id'];
        //var_dump($idcat);
      }  
    }
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

    if (count($errores)>0) {
        $_SESSION['errores'] = $errores;
        if (count($_SESSION['errores'])>0) {
          $errores = $_SESSION['errores'];
          foreach ($errores as $error) {
            echo "<div class='mensajes error'>$error</div>";
          }
        }
        $_SESSION['errores'] = Array();
    }

    else {
        $sql = "UPDATE entradas SET titulo='$titulo',descripcion='$descripcion',categoria_id=$idcat
        WHERE id=$id_entrada";
        $result = mysqli_query($conexion,$sql);
        //var_dump($sql);

        if ($result) {
            header("Location: index.php");
            //var_dump($_SESSION['mensajesexito']);
        }
    }
}

?>

