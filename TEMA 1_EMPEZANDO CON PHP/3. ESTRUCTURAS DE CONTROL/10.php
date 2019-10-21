<?php

$num1 = $_POST['numero1'];
$num2 = $_POST['numero2'];

if ($num2>$num1) {
    $num1 = $num2;
    $num2 = $num1;
}

for ($i=$num2;$i<$num1;$i++) {
    if ($i%2 != 0) {
        echo $i."<br />";    
    }
}

?>