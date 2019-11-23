<nav class="navegacion">
<ul>

<?php 
require_once 'includes/conecta.php';

$sql= "SELECT nombre FROM categorias";
$resultado= mysqli_query($conexion, $sql);
var_dump($sql);

if (mysqli_num_rows($resultado)>0){
    while ($fila= mysqli_fetch_assoc($resultado) ){
?>
    <li><a href="ver_entrada_categoria.php?id=<?php echo $fila['id'];
?>"></a><?php echo $fila["nombre"]
    }
}?></li>
    <li><a href="sobre_mi.php">Sobre mi</a></li>
    <li><a href="contacto.php">Contacto</a></li>
</ul>
</nav>
