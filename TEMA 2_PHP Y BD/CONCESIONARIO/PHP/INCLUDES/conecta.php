<?php

$servidor = "localhost";
$usuario = "usuario_concesionario";
$clave = "concesionario";
$bd="concesionario";

$conexion=mysqli_connect($servidor,$usuario,$clave,$bd);
if (mysqli_connect_errno()) {
    echo "No se ha podido conectar, ha habido un error</br>";
    die("Error: " .mysqli_connect_error());
}
?>