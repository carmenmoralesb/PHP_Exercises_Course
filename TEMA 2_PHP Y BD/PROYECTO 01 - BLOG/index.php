<?php @ob_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bedstead" type="text/css"/>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/now" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
</head>

<body>    
<div id="contenedor">

<?php require_once 'includes/conecta.php';?>
<?php include 'includes/header.php';?>

<div id="central">
<div class="encabezado">
<h1>Últimas entradas</h1>

</div>
<?php
$sql= "SELECT entradas.fecha AS entrada_fecha, entradas.id AS entrada_id,titulo,descripcion,usuarios.nombre AS usunombre,categorias.nombre,usuario_id FROM entradas INNER JOIN usuarios ON entradas.usuario_id = usuarios.id 
       INNER JOIN categorias ON entradas.categoria_id = categorias.id
       ORDER BY entrada_fecha desc";

$resultado= mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado)>0) {
    while ($fila= mysqli_fetch_assoc($resultado)) {
          $id = $fila['entrada_id'];
          $autor = $fila['usunombre'];
          $titulo = $fila['titulo'];
          $fecha = $fila['entrada_fecha'];
          // sustraigo parte de la descripcion para ver una vista previa de la entrada
          $descripcion = substr($fila['descripcion'],0,600);
?>
<section>
    <img src="imagenes/entrada.png">
    <div class="cabecera_entrada">
    <h2><?php echo $fila['titulo']?></h2>
    
    <?php 
    // si la sesion id está seteada es porque el usuario está logueado, nos queda por ver
    // si el usuairo es el mismo que el autor de la entrada, si lo es aparecen los iconos
    // de edicion
    //var_dump($_SESSION['id']);

    if  (isset($_SESSION['id']) && $_SESSION['id']==$fila['usuario_id']) {?>
    <a href="borrar_entrada.php?id_entrada=<?= $id ?>">
    <i class="fas fa-minus-square"></i></a>
    <a href="editar_entrada.php?id_entrada=<?= $id ?>">
    <i class="fas fa-pen-square"></i></a>
    <?php }?>
    </div>
    <h3><?php echo $fecha ?></h3>
    <article>
    <h4>Autor: <?php echo $autor ?></h4>
    <p><?php echo $descripcion ?></p>
    <a><button class="leer_mas">Leer más</button></a>
</article>
</section>
    <?php } 
}?>
</div>
<?php 
// pongo los formularios
if (!(isset($_SESSION['nombre']))) {
    require_once 'require/formularios_login.php';
}
// si el id de SESSION está seteado es porque hay un usuario logueado, asi que
// muestro el panel lateral con las opciones de creación

else {
    // se setean las variables de error
    require_once 'require/forms_panel.php';
}
?>
</div>
<?php include 'includes/footer.php';?>

</div>
</body>
</html>