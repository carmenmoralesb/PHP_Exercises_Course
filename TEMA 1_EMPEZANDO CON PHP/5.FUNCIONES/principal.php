<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" type="text/css" rel="stylesheet">
<title></title>
</head>
<header>
        <nav class='naveg'>
            <ul>
                <li><a href='01_ini.php'>Ejercicio 1</a></li>
            </ul>
    </nav>
    </header>
<body>
Introduce un número para ver<br/>
<ul>
<li>1.Números primos</li>
<li>2.Números capicúa</li>
<li>3.Pasar de binario a decimal</li>
<li>4.Pasar de decimal a binario</li>
</ul>


<?php

// Carga las funciones matemáticas

    require_once 'matematicas.php';
    if (!isset($_POST['numero'])) {
        
?>

<form action=principal.php method="post">
<input type="number" name="numero" min="0" autofocus><br/>
<input type="submit" value="Aceptar">
</form>
<?php

} else {
    if (is_numeric(($_POST['numero']))){
        $numero=(int)$_POST['numero'];
        echo "<h1>DECIMAL A BINARIO</h1>";
        echo decaBin($numero);
        echo "<h1>BINARIO A DECIMAL</h1>";
        echo binaDec($numero);
}
}

echo "<h1>NUMEROS PRIMOS DEL 1 AL 1000</h1>";
echo esPrimo();
echo "<h1>NUMEROS CAPICUAS DEL 1 AL 9999</h1>";
echo capicuas();
?>
</body>
</html>