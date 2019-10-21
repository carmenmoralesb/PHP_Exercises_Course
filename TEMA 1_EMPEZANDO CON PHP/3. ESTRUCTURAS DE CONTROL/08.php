<?php

$num1 = $_POST["numero1"];
$principio = 0;    
$siguiente = 1; 

for($i=0;$i<=$num1;$i++)    
{    
    $res = $principio + $siguiente;    
    echo $res."<br />";         
    $principio=$siguiente;       
    $siguiente=$res;     
} 

?>