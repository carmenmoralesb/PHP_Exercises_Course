<?php

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$num3 = $_POST["num3"];

// 1. num1 es el menor y num3 es mayor que num2

if (($num1<$num2) && ($num1<$num3) && ($num2<$num3)) {
    echo " Ordenados de mayor a menor " .$num3. "," .$num2. ",".$num1;
}

if (($num1>$num2) && ($num1<$num3) && ($num2<$num3)) {
    echo " Ordenados de mayor a menor " .$num3. "," .$num1. ",".$num2;
}

// 2. num1 es menor que num2 y num3 pero num2 es mayor que num3
if (($num1<$num2) && ($num1<$num3) && ($num3<$num2)) {
    echo " Ordenados de mayor a menor " .$num2. ",".$num3. ",".$num1;
}

// 2. num1 es mayor que num2 y num3 y num3 mayor que num2
if (($num1>$num2) && ($num1>$num3) && ($num3>$num2)) {
    echo " Ordenados de mayor a menor " .$num1. "," .$num3. "," .$num2;
}

// 3. num1(num1) num1 que num2 pero menor que num3, num3 > num2
// num1 = num3

else {
    echo " Ordenados de mayor a menor " .$num1. "," .$num2. "," .$num3;
}
?>