<?php

$num1 = $_POST['numero1'];
$primo = true;

for ($i=2;$i<$num1;$i++) {
    if ($num1%$i==0) {
        $primo = false;
    }
}

if ($primo==false) {
    echo 'El número no es primo';
}

else {
    echo 'El número es primo';
}



?>