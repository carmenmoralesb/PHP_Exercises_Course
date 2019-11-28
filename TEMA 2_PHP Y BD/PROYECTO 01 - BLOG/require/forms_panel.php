<div class="lateral">
<?php require_once "require/form_buscar.php"?>

<?php 

$_SESSION['errores'] = Array();
$_SESSION['exito'] = Array();

$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
    
// selecciono el id para guardarlo en otra variable ya que es útil para
// por ej la edicion de entradas y la creacion
    
$consulta = "SELECT id FROM usuarios WHERE email = '$correo' AND nombre='$nombre'";
//var_dump($consulta);
$existe = mysqli_query($conexion,$consulta);
//var_dump($existe);

if (mysqli_num_rows($existe)>0) {
    while ($fila= mysqli_fetch_assoc($existe)) {
        $idusuario = $fila['id'];  
    }   
    $_SESSION['id'] = $idusuario;
}


require_once "require/forms_panel.php";
?>

<div class="lat1panel">
<div class="foto"><img class="perfil" src="imagenes/icon.png">
</div>
<ul class="listapanel">
<li class="botonpanel"><a href="crear_entrada.php">Crear entrada</a></li>
<li class="botonpanel"><a href="crear_categoria.php">Crear categoría</a></li>
<li class="botonpanel"><a href="mis_datos.php?id=<?php ECHO $_SESSION['id']?>">Mis datos</a></li>
<li class="botonpanel"><a href="logout.php">Cerrar sesión</a></li>
</ul>
</div>
</div>
</div>