<?php
    $radio = (int)($_POST['radio']);
    define ('pi',3.1416);


    echo "Longitud: " . 2*pi*$radio .'<br>'; 
    echo " Área: " . $radio*$radio*pi .'<br>'; 
