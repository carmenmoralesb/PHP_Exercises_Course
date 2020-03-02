<?php
require_once 'models/pedido.php';

class pedidoController{
	
	public function hacer(){
		
		require_once 'views/pedido/hacer.php';
	}
	
	public function add(){
		if(isset($_SESSION['identity'])){
			$usuario_id = $_SESSION['identity']->id;
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			
			$stats = Utils::cantidadesCarro();
			$coste = $stats['total'];
				
			if($provincia && $localidad && $direccion){
				// Guardar datos en bd
				$pedido = new Pedido();
				$pedido->setUsuario_id($usuario_id);
				$pedido->setProvincia($provincia);
				$pedido->setLocalidad($localidad);
				$pedido->setDireccion($direccion);
				$pedido->setCoste($coste);
				
				$save = $pedido->save();
				
				// Guardar linea pedido
				$save_linea = $pedido->save_linea();
				
				if($save && $save_linea){
					$_SESSION['pedido'] = "complete";
				}else{
					$_SESSION['pedido'] = "failed";
				}
				
			}else{
				$_SESSION['pedido'] = "failed";
			}
			header('Location: index.php?c=Pedido&a=confirmado');

		}else{
			// Redigir al index
			header('Location: index.php');

		}
	}
	
	public function confirmado(){
		if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];
			$pedido = new Pedido();
			$pedido->setUsuario_id($identity->id);
			
			$pedido = $pedido->obtenerPedidoUsuario();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->productosPorPedido($pedido->id);
		}
		require_once 'views/pedido/confirmado.php';
	}
	
	public function mis_pedidos(){
		Utils::identificar();
		$usuario_id = $_SESSION['identity']->id;
		$pedido = new Pedido();
		
		// Sacar los pedidos del usuario
		$pedido->setUsuario_id($usuario_id);
		$pedidos = $pedido->obtenerPedidosUsuario();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function detalle(){
		Utils::identificar();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];	
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido = $pedido->obtenerPedido();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->productosPorPedido($id);
			var_dump($productos);
			require_once 'views/pedido/detalle.php';
		}else{
			header('Location: index.php?c=Pedido&a=mis_pedidos');
		}
	}
	
	public function gestion(){
		Utils::esAdmin();
		$gestion = true;
		
		$pedido = new Pedido();
		$pedidos = $pedido->obtenerTodosPedidos();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function estado(){
		Utils::esAdmin();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->edit();

			header('Location: index.php?c=Pedido&a=detalle&id='.$id);
		}else{
			header('Location: index.php');

		}
	}
	
	
}