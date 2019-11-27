<?php if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}?>



<form action="crear_categoria.php" method="post"> 
<label for="nombre">Nombre</label>
<input type="text" placeholder="Nombre de categoría" name="nombre">
<input type="submit" value=" Enviar " name="submitcategoria">
</form>

<?php 

$errores = Array();

if(isset($_POST["submitcategoria"])){
    
    $nombre = $_POST['nombre']? mysqli_real_escape_string($conexion, trim ($_POST['nombre'])) : false;
    //var_dump($nombre);

    $sql2 = "SELECT nombre FROM categorias WHERE nombre='$nombre'";
    $resultado = mysqli_query($conexion,$sql2);

    //var_dump($sql2);
    //var_dump($resultado);

    
    if (empty($nombre)) {
        $errores['nombre'] = "Error, escribe un nombre";
      }

    if (mysqli_num_rows($resultado)>0) {
        $errores['existe'] = 'Esa categoría ya existe';
      }  
    
    if (count($errores)>0) {
        $_SESSION['errores'] = $errores;
        $errores = $_SESSION['errores'];
        foreach ($errores as $error) {
            echo "<div class='mensajes error'>$error</div>";
          }
        $_SESSION['errores'] = Array();
      }

    else { 
        $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre')"; 
        $result = mysqli_query($conexion,$sql);
        
        if ($result) {
            header("Location: index.php");
        }
    }
}

?>