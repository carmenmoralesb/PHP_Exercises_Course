<?php

$mayor = $_POST["num1"];
$num2 = $_POST["num2"];
$num3 = $_POST["num3"];

// 1. mayor(num1) menor que num2 y que num, num2 menor que num3 
// salida: num3,num2,num1

if (($mayor<$num2) && ($mayor<$num3) && ($num2<$num3)) {
    $mayor = $num3
    echo " Ordenados de mayor a menor" .$mayor .$num2 $num1;
}

// 2. mayor(num1) mayor que num2 y que num3, num3 mayor que num2
// salida: num1,num3,num2
elseif (($mayor>$num2) && ($mayor>$num3) && ($num3>$num2)) {
    echo " Ordenados de mayor a menor" .$mayor .$num3 $num2;

}

// 3. mayor(num1) mayor que num2 pero menor que num3, num3 > num2
// mayor = num3
elseif (($mayor>$num2) && ($mayor<$num3) && ($mayor>$num2)) {
    echo " Ordenados de mayor a menor" .$mayor .$num3 $num2;

}

?>