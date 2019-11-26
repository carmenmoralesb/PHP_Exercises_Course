<?php if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}?>

<form action="crear_categoria.php" method="post"> 
<label for="nombre">Nombre</label>
<input type="text" placeholder="Nombre de categoría" name="nombre">
<input type="submit" value=" Enviar " name="submitcategoria">
</form>

<?php if (isset($_SESSION['errores']) && isset($_POST["submitcategoria"])) {
            if (count($_SESSION['errores']) > 0) {
                $errores = $_SESSION['errores'];
                foreach ($errores as $error) {
                echo "<div class='mensajes error'>$error</div>";
                }
            }
            unset($_SESSION['errores']);
        }
        ?>