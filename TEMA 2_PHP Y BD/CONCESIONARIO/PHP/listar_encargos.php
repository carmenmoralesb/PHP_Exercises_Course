<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php include 'INCLUDES/header.php';?>
<?php include 'INCLUDES/nav.php';?>
<?php require_once 'INCLUDES/conecta.php';?>

<div class="contenido">
<div class="formulario">

<h2 align="center" class="cabeform">Seleccionar cliente</h2>
<form method='get'>
<label>Escoge un cliente</label>
<select name="clientes" id="clientes">
<?php

$sql = "SELECT * FROM clientes";
$resultado= mysqli_query($conexion, $sql);
var_dump($resultado);

if (mysqli_num_rows($resultado)>0) {
    while ($fila= mysqli_fetch_assoc($resultado) ){
        echo "<option>";
        echo $fila['nombre'];
        echo "</option>";

        $id = $fila['id'];
    }
}
?>
</select>
<input type="submit" value=" Enviar " name="submit2">
</form>


<?php 

if(isset($_GET["submit2"])) {
    $cliente = $id;
    $consulta = "SELECT co.modelo,co.marca,e.cantidad, e.fecha
    FROM clientes c
    INNER JOIN encargos e ON e.cliente_id = c.id
    INNER JOIN coche co ON e.coche_id = co.id
    WHERE cliente_id =$cliente";

    $existe = mysqli_query($conexion,$consulta);
    //var_dump($existe);
    ?>

    <table class="tablainterior">
    <tr>
    <th>Modelo</th>
    <th>Marca</th>
    <th>Cantidad</th>
    <th>Fecha</th>
    </tr>

    <?php
    if (mysqli_num_rows($existe)>0) {
        while ($fila= mysqli_fetch_assoc($existe) ){?>
            <tr><td><?= $fila['modelo']?></td>
            <td><?= $fila['marca']?></td>
            <td><?= $fila['cantidad']?></td>
            <td><?= $fila['fecha']?></td></tr>
    <?php
        }
        
        ?>
        </tbody>
        </table>

        <?php
    }
    else{
        echo '0 Registros';}
        mysqli_close($conexion);
}
?>
</div>
</div>
</body>
<?php include 'INCLUDES/footer.php';?>
</html>