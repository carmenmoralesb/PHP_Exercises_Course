<?php

class Utils{
	
	public static function borraSesion($sesion){
		if(isset($_SESSION[$sesion])){
			$_SESSION[$sesion] = null;
			unset($_SESSION[$sesion]);
		}
		return $sesion;
	}
	
	public static function esAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location: index.php");
		}else{
			return true;
		}
	}
	
	public static function identificar(){
		if(!isset($_SESSION['identity'])){
			header("Location: index.php");
		}else{
			return true;
		}
	}
	
	public static function mostrarCats(){
		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->obtenerTodas();
		return $categorias;
	}

	/* ESTADO DEL PEDIDO */
	public static function mostrarEstado($estado){
		$valor = 'Pendiente';
		
		if($estado == 'confirm'){
			$valor = 'Pendiente';
		}elseif($estado == 'preparation'){
			$valor = 'En preparación';
		}elseif($estado == 'ready'){
			$valor = 'Preparado para enviar';
		}elseif($estado = 'sended'){
			$valor = 'Enviado';
		}
		
		return $valor;
	}
	
	/*TOTAL DE PRODUCTOS Y DE DINERO GASTADO EN EL PEDIDO*/
	
	public static function cantidadesCarro(){
		$cantidad = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$cantidad['count'] = count($_SESSION['carrito']);
			
			foreach($_SESSION['carrito'] as $producto){
				$cantidad['total'] += $producto['precio']*$producto['unidades'];
			}
		}
		return $cantidad;
	}
	
}
