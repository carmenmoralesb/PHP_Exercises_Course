<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset='utf-8'>
    <title>EJERCICIO 4</title>
</head>

<body>
    <?php
    $radio = 12;
    define ('pi',3.1416);
?>

    <h1>Calculadora de longitud de circunferencia</h1>
    <?php
          echo "Longitud: " . 2*pi*$radio .'<br>'; 
          echo " Área: " . $radio*$radio*pi .'<br>'; 
    ?>
</body>
</html>