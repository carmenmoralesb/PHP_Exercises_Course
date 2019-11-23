<header class="cabecera">
<img src="imagenes/space-review.png">

<ul class="navegacion">
<?php
require_once 'includes/conecta.php';


$sql= "SELECT * FROM categorias";
$resultado= mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)>0){
    while ($fila= mysqli_fetch_assoc($resultado) ){
?>
    <li><a href="ver_entrada_categoria.php?id=<?php echo $fila['id'];?>">
    <?php echo $fila['nombre']; }
    } ?></a></li>
    <li><a href="sobre_mi.php">SOBRE MI</a></li>
    <li><a href="contacto.php">CONTACTO</a></li>
</ul>
</header>