<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php 

// isset — Determina si una variable está definida y no es NULL

if (isset($_POST['numeroIntroducido'])) {
    $numeroIntroducido = (int)$_POST['numeroIntroducido'];
    $media = 0;
    $suma= (int)$_POST['suma'];
    $contador = (int)$_POST['contador'];
}

else {
    $media = 0;
    $suma = 0;
    $numeroIntroducido = 0;
    $contador = 0;
}
    
    if ($numeroIntroducido < 0 ) {
        $media = $suma/$contador;
        echo "<h1>La media es .$media</h1>";
    } 

    elseif ($numeroIntroducido>0) 
    {
        $contador++;
        $suma +=  $numeroIntroducido;
        echo "<h1>Programa para calcular la media</h1>";
        require_once '02form.php';

        var_dump($contador);
        var_dump($suma);
    } 

    elseif ($numeroIntroducido == null) {
        echo "<h1>Programa para calcular la media</h1>";
        require_once '02form.php';
    }

?>
</body>
</html>