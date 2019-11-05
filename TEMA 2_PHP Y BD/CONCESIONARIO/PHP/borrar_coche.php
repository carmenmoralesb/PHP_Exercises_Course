<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>
<body>

<div class="contenedor">
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>
<?php require_once 'INCLUDES/conecta.php';?>

<div class="formulario">
<h2 align="center">Borrar coche</h2>
<form action="borrar_coche.php" method="post"> 
    <label>Identificador del coche</label>
    <input type="number" name="id">
    <input type="submit" value=" Enviar " name="submit"/>
</form>
<?php 

if(isset($_POST["submit"])){
    $id = $_POST["id"];

    $consulta = "SELECT * FROM coche WHERE id = $id";
    $existe = mysqli_query($conexion,$consulta);
    var_dump($existe);

    # SI EL COCHE NO EXISTE SE DA UN MENSAJE DE ERROR
    if (mysqli_num_rows($existe)>0){ 
        # SI EXISTE ES QUE EN NUMROWS HAY MAS DE CERO FILAS, EL COCHE EXISTE
            $sql = "DELETE FROM coche WHERE id = $id";
            $result = mysqli_query($conexion,$sql);
            ?>
        <?php if ($result) {
            header("Location: listar_coches.php");
        }
        ?>
        
        <div class="mensajes success">
        <p>Se ha borrado el registro</p>
        </div>
        </div>

    <?php
    }
    else {

        ?>
        <div class="mensajes error">
        <p>No existe ese coche</p>
        </div>    
        </div>

    <?php
}
}

else
    echo "</div>"
?>

<?php include 'INCLUDES/footer.php';?>
</div>
</body>
</html>