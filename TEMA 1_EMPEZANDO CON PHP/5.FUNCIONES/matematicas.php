<?php
function esPrimo(){
    for($i=1;$i<=1000;$i++){
        $contador = 0; 
        for($j=1;$j<=$i;$j++){
            if($i % $j==0){ 
                $contador++;
            }
        }
        if($contador==2){
           print $i. "  ,";
          }
      }
  }

function esCapi ($valor) {
    $auxiliar = $valor;
    $suma = 0;
    while (floor($auxiliar)) 
    {
        $digito = $auxiliar % 10;
        $suma = $suma*10 + $digito;
        $auxiliar = $auxiliar/10;
    }
    if ($valor==$suma) {
      return 0;
    }
    else {
        return 1;
    }
}

function inverso ($valor) {
    $suma = 0;
    while (floor($valor)) 
    {
        $digito = $valor % 10;
        $suma = $suma*10 + $digito;
        $valor = $valor/10;
    }
    return $valor;
}
  
function capicuas() {
    for($i=10;$i<=9999;$i++){
        if (esCapi($i)==0) {
            print $i. "  ,";
        }
      }
  }

function decaBin ($valor) {
    $cadena = '';
    
    while ($valor > 1) {
        $modulo = $valor % 2;
        //echo"<br>";
        // % Módulo o Resto de valor dividido entre 2 
        $cadena = "$modulo".$cadena; 
        // Concatenamos modulo(string), con cadena 
        $valor = ($valor/2);
    }
    print ($cadena);
}

function binaDec ($binario) {
    $dec = 0;
    #var_dump($dec);
    $base = 1; 
    $contador = strlen($binario);

    for ($i=$contador-1; $i>=0;$i--) 
    { 
        if ($binario[$i]=='1'){  
            $dec+=$base; 
        }
        $base = $base*2; 
    } 
    print($dec);
}
  
?>