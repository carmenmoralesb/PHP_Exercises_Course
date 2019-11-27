<header class="cabecera">
<a href="index.php"><img src="imagenes/logo.png"></a>
<ul class="navegacion">
<ul>
<li><a>Sobre mí</a></li>
<li><a>Contacto</a></li>
</ul>
</header>
<div id="navegacion">
<ul class="navegacion2">
<?php
require_once 'includes/conecta.php';


$sql= "SELECT * FROM categorias";
$resultado= mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)>0){
    while ($fila= mysqli_fetch_assoc($resultado) ){
?>
    <li><a href="categoria.php?cat=<?php echo $fila['id'];?>">
    <?php echo $fila['nombre']; }
    } ?></a></li>
</ul>
</div>
