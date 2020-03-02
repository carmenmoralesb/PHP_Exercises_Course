<?php
session_start();

require_once 'models/tiendaDB.php';


require_once 'controllers/CarritoController.php';
require_once 'controllers/ProductoController.php';
require_once 'controllers/CategoriaController.php';
require_once 'controllers/PedidoController.php';
require_once 'controllers/UsuarioController.php';

require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



if(!isset($_GET['c']) || !isset($_GET['a'])) {
	$controlador = new ProductoController();
	$controlador -> index();
}

else {
	$nombre_controlador = $_GET['c'].'Controller';
	if (class_exists($nombre_controlador)) {
		$controlador = new $nombre_controlador();
		if (method_exists($controlador,$_GET['a'])) {
			$action = $_GET['a'];
			$controlador -> $action();
	}
		else {
			echo "La página no existe";       
}
}
	else {
		echo "La página no existe";
	}
	}

	

require_once 'views/layout/footer.php';


