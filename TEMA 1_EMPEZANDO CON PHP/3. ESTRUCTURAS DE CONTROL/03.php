<?php 

$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];

$media = ($nota1+$nota2+$nota3)/3;

if ($media<5) {
    echo " Insuficiente ";
}

elseif (($media>=5) && ($media<=6)) {
    echo " Suficiente";
}

elseif (($media>=7) && ($media<=8) ) {
    echo " Notable";
}
else  {
    echo " Sobresaliente";
}
?>