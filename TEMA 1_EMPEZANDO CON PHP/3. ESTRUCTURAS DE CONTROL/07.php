<html>
<head>
    <title>Title</title>
    <style type="text/css">
table {
		font-family: verdana, arial, sans-serif;
		font-size: 11px;
		color: #333333;
		border-width: 1px;
		border-color: #3A3A3A;
        border-collapse: collapse;
        width: 100%;
	}
 
table th {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #517994;
		background-color: #B2CFD8;
	}
 
table tr:hover td {
		background-color: #DFEBF1;
	}
 
table td {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #517994;
		background-color: #ffffff;
	}
</style>    
</head>
<body>
<?php

$columnas = 10;
$filas = 10;
$numerotabla = 1;
$factor2 = 0;

echo "<table>";
echo "<th colspan='11'>TABLAS DE MULTIPLICAR</th>";
// inserto una fila por cada tabla de multiplicar
for ($fila = 0; $fila <= $filas; $fila++){
    echo('<tr>');
    if ($fila == 0) {
        for ($multi = 0; $multi <= $filas; $multi++) {
            // aumento el multiplicador y voy rellenadno las celdas de la fila
            echo('<td>' .$factor2++.'</td>');
        }
    }
    
    // si la colu es cero y la fila es distinta a cero
    // numerotabla se incrementa
    for ($colu = 0; $colu <= $columnas; $colu++){
        if ($colu == 0 && $fila != 0) {
            echo('<td>' .$numerotabla++.'</td>');
            // si no multiplico el vlor de la colmna por la fila
        } else if ($fila != 0) {
            echo( '<td>' .$colu*$fila.'</td>');
        }
    }
echo('</tr>');
}

echo("</table>");
?>
</body>
</html>