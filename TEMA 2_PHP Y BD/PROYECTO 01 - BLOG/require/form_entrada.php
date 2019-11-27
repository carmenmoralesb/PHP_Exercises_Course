<?php if (!isset($_SESSION['nombre'])) {
    header("location: index.php");
}?>

<form action="crear_entrada.php" method="post"> 
<label for="titulo">Titulo</label>
<input type="text" placeholder="Un título" name="titulo">
<label for="descripcion">Descripción</label>
<textarea name="descripcion" style="height:150px;">Lorem ipsum dolor 
sit amet consectetur adipisicing elit. Rerum quia consectetur dolorum 
sed nobis mollitia ullam! Placeat rem perspiciatis 
ipsum tenetur quasi blanditiis, ipsam eius quam quod pariatur quos et!</textarea>
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


<?php

if(isset($_POST["submitentrada"])){
    $errores = Array();
    
    $titulo = $_POST['titulo']? mysqli_real_escape_string($conexion, trim ($_POST['titulo'])) : false;
    $categoria =  $_POST['categoria'];
    $descripcion = $_POST['descripcion']? mysqli_real_escape_string($conexion, trim ($_POST['descripcion'])) : false;
    
    $correo = $_SESSION['correo']; 

    $sql2 = "SELECT id FROM usuarios WHERE email='$correo'";
    $resultado = mysqli_query($conexion,$sql2);

    if (mysqli_num_rows($resultado)>0) {
      while ($fila= mysqli_fetch_assoc($resultado)) {
        $idusuario = $fila['id'];
      }  
    }

    $sql3 = "SELECT id FROM categorias WHERE nombre='$categoria'";
    $resultado2 = mysqli_query($conexion,$sql3);
    //var_dump($sql3);
    //var_dump($resultado2);

    if (mysqli_num_rows($resultado2)>0) {
      while ($fila= mysqli_fetch_assoc($resultado2)) {
        $idcat = $fila['id'];
        //var_dump($idcat);
      }  
    }

    if (empty($titulo)) {
      $errores['titulo'] = "Error, escribe un titulo";
    }

    if (empty($descripcion)) {
      $errores['descripcion'] = "Error, escribe una descripcion";
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
      $sql = "INSERT INTO entradas (titulo,usuario_id,descripcion,categoria_id,fecha) 
      VALUES ('$titulo',$idusuario,'$descripcion',$idcat,curdate())";
      $result = mysqli_query($conexion,$sql);

      if ($result) {
        header("Location: index.php");
      }
    }
  }


?>
