<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php 

$combiSecreta = 1234;
// isset — Determina si una variable está definida y no es NULL

if (isset($_POST['oportunidades']) && ($_POST['numeroIntroducido'])){
    $oportunidades = (int)$_POST['oportunidades'];
    $numeroIntroducido = (int)$_POST['numeroIntroducido'];
}

else {
    $oportunidades = 4;
    $numeroIntroducido=0;}
    
    if ($numeroIntroducido == $combiSecreta ) {
        echo "<h1>Enhorabuena, has abierto la caja.</h1>
             <img src='https://lovesvg.com/wp-content/uploads/2018/12/Lets_Party_8228-260x185.png'>";
    } 
    elseif ($oportunidades == 0) {
        echo "<h1>Lo siento, has agotado todas tus oportunidades. Has perdido</h1>";
    } 
    elseif ($numeroIntroducido == 0){
        echo "<h1> Bienvenido al juego abrir la caja.</h1> <h3>Tienes $oportunidades oportunidades para
        acertar la combinación</h1></h3>";
        require_once '01form.php';
    } 
    else {
        $oportunidades--;

    if ($combiSecreta  > $numeroIntroducido){
        echo "<h1>La combinación es mucho menor.</h1>";
    }else {
        echo "<h1>La combinación es mucho mayor</h1>";
    }
    require_once 'formadivina.php';
}
?>
</body>
</html>