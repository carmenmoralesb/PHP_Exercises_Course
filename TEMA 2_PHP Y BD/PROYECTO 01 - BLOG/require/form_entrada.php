<?php if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}?>

<form action="crear_entrada.php" method="post"> 
<label for="titulo">Titulo</label>
<input type="text" placeholder="Un videojuego fantástico" name="titulo">
<label for="descripcion">Descripción</label>
<textarea name="descripcion" style="height:150px;"></textarea>
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
<input type="submit" value=" Enviar " name="submitentrada">
</form>

<?php if (isset($_SESSION['errores']) && isset($_POST["submitentrada"])) {
            if (count($_SESSION['errores']) > 0) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                echo "<div class='mensajes error'>$error</div>";
                }
            }
            unset($_SESSION['errores']);
        }