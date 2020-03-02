<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
	
	public function index(){
		Utils::esAdmin();
		$categoria = new Categoria();
		$categorias = $categoria->obtenerTodas();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->obtenerCategoria();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->verProdCat();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::esAdmin();
		require_once 'views/categoria/crear.php';
	}
	
	public function save(){
		Utils::esAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();
		}
		header('Location: index.php?c=Categoria&a=index');
	}
	
}