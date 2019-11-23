<?php

$servidor = "localhost";
$usuario = "bloguero";
$clave = "blog";
$bd="blog";

$conexion=mysqli_connect($servidor,$usuario,$clave,$bd);
mysqli_set_charset($conexion,'utf8');
if (mysqli_connect_errno()) {
    echo "No se ha podido conectar, ha habido un error</br>";
    die("Error: " .mysqli_connect_error());
}

if (!isset($_SESSION)) {
    session_start();
}

?>