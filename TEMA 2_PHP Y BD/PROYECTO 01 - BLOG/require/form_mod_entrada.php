<?php if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}?>

<?php


if (isset($_GET['id_entrada'])) {
    $id_entrada = $_GET['id_entrada'];
    $sql2 = "SELECT id,titulo,descripcion,categoria_id FROM entradas WHERE id=$id_entrada";
    $resultado2= mysqli_query($conexion, $sql2);
    
    if (mysqli_num_rows($resultado2)>0) {
        while ($fila= mysqli_fetch_assoc($resultado2) ){
            $id_entrada = $fila['id'];
            $titulo = $fila['titulo'];
            $descripcion = $fila['descripcion'];
            $categoria = $fila['categoria_id'];
    }
    
    ?>
    <form action="editar_entrada.php" method="post"> 
    <input type="hidden" value=<?php echo $id_entrada ?> name="id_entrada">
    <label for="título">Titulo</label>
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
}

else {
    $errores['noexiste'] = 'No existe esa entrada';
}
?>

<?php if (isset($_SESSION['errores']) && isset($_POST["submitmodentrada"])) {
            if (count($_SESSION['errores']) > 0) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                echo "<div class='mensajes error'>$error</div>";
                }
            }
            unset($_SESSION['errores']);
        }
?>