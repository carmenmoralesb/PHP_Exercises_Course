<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
    $numeroSecreto = 24;
    if (isset($_POST['oportunidades']) && ($_POST['numeroIntroducido'])){
        $oportunidades = (int)$_POST['oportunidades'];
        $numeroIntroducido = (int)$_POST['numeroIntroducido'];
    }
    else {
        $oportunidades = 4;
        $numeroIntroducido=0;}
        
        if ($numeroIntroducido == $numeroSecreto) {
            echo "<h1>Enhorabuena, has acertado el número.</h1>";
        } 
        elseif ($oportunidades == 0) {
            echo "<h1>Lo siento, has agotado todas tus oportunidades. Has perdido</h1>";
        } 
        elseif ($numeroIntroducido==0){
            echo "<h1> Bienvenido al juego adivina un número. Tienes $oportunidades oportunidades para
            acertar un número entre 1 y 50</h1>";
            require_once 'formadivina.php';
        } 
        else {
            $oportunidades--;

        if ($numeroSecreto > $numeroIntroducido){
            echo "<h1>El número que estoy pensando es mayor que el número que has
            introducido.</h1>";
        }else {
            echo "<h1>El número que estoy pensando es menor que el número que has
            introducido</h1>";
        }
        require_once 'formadivina.php';
    }
    ?>
    </body>
    </html>