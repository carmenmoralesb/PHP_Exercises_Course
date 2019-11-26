<?php 
session_start();

// unseteo todas las variables del usuario
if (isset($_SESSION['nombre'])) {
unset($_SESSION['nombre']);
unset($_SESSION['correo']);
unset($_SESSION['apellidos']);
unset($_SESSION['errores']);
unset($_SESSION['exito']);
unset($_SESSION['id']);
unset($_SESSION['errores']);
unset($_SESSION['exito']);
session_destroy();
}
header('location:index.php');
?>