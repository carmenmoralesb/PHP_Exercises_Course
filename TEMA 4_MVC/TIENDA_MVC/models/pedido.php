<?php

class Pedido extends Database {
	private $id;
	private $usuario_id;
	private $provincia;
	private $localidad;
	private $direccion;
	private $coste;
	private $estado;
	private $fecha;
	private $hora;

	private $conn;
	
	public function __construct($id=null,$usuario_id=null,$provincia=null,$localidad=null,$direccion=null,$coste=null,$estado=null,$fecha=null,$hora=null,$conn=null) 
	{
		$this->conn=parent::conectaDB();

		if (isset($usuario_id)) {
            $this->usuario_id=$usuario_id;
		}

		if (isset($provincia)) {
            $this->provincia=$provincia;
		}

		if (isset($localidad)) {
            $this->localidad=$localidad;
		}

		if (isset($direccion)) {
            $this->direccion=$direccion;
		}

		if (isset($coste)) {
            $this->coste=$coste;
		}

		if (isset($estado)) {
            $this->estado=$estado;
		}

		if (isset($fecha)) {
            $this->fecha=$fecha;
		}

		if (isset($hora)) {
            $this->hora=$hora;
		}	
	}

	
	public function obtenerTodosPedidos(){
		$productos = $this->conn->query("SELECT * FROM pedidos ORDER BY id DESC");
		return $productos;
	}
	
	public function obtenerPedido(){
		$producto = $this->conn->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
		return $producto->fetchObject();
	}
	
	public function obtenerPedidoUsuario(){
		$sql = "SELECT ped.id, ped.coste FROM pedidos ped "
				//. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
				. "WHERE ped.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
			
		$pedido = $this->conn->query($sql);
			
		return $pedido->fetchObject();
	}
	
	public function obtenerPedidosUsuario(){
		$sql = "SELECT ped.* FROM pedidos ped " . "WHERE ped.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
			
		$pedido = $this->conn->query($sql);
			
		return $pedido;
	}
	
	
	public function productosPorPedido($id){
	
		$sql = "SELECT pr.*, lp.unidades FROM productos pr "
				. "INNER JOIN lineas_pedido lp ON pr.id = lp.producto_id "
				. "WHERE lp.pedido_id={$id}";
				
		$productos = $this->conn->query($sql);
			
		return $productos;
	}
	
	public function save(){
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
		$save = $this->conn->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
		$sql .= " WHERE id={$this->getId()};";
		
		$save = $this->conn->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function save_linea(){
		// el ultimo registro de los pedidos
        $sql = "SELECT last_insert_id() as 'pedido';";
        $query = $this->conn->query($sql);
        $pedido_id = $query->fetchObject()->pedido;
        
        foreach ($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];
            $insert = "INSERT INTO lineas_pedido VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->conn->query($insert);          
        }
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of usuario_id
	 */ 
	public function getUsuario_id()
	{
		return $this->usuario_id;
	}

	/**
	 * Set the value of usuario_id
	 *
	 * @return  self
	 */ 
	public function setUsuario_id($usuario_id)
	{
		$this->usuario_id = $usuario_id;

		return $this;
	}

	/**
	 * Get the value of provincia
	 */ 
	public function getProvincia()
	{
		return $this->provincia;
	}

	/**
	 * Set the value of provincia
	 *
	 * @return  self
	 */ 
	public function setProvincia($provincia)
	{
		$this->provincia = $provincia;

		return $this;
	}

	/**
	 * Get the value of localidad
	 */ 
	public function getLocalidad()
	{
		return $this->localidad;
	}

	/**
	 * Set the value of localidad
	 *
	 * @return  self
	 */ 
	public function setLocalidad($localidad)
	{
		$this->localidad = $localidad;

		return $this;
	}

	/**
	 * Get the value of direccion
	 */ 
	public function getDireccion()
	{
		return $this->direccion;
	}

	/**
	 * Set the value of direccion
	 *
	 * @return  self
	 */ 
	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;

		return $this;
	}

	/**
	 * Get the value of coste
	 */ 
	public function getCoste()
	{
		return $this->coste;
	}

	/**
	 * Set the value of coste
	 *
	 * @return  self
	 */ 
	public function setCoste($coste)
	{
		$this->coste = $coste;

		return $this;
	}

	/**
	 * Get the value of estado
	 */ 
	public function getEstado()
	{
		return $this->estado;
	}

	/**
	 * Set the value of estado
	 *
	 * @return  self
	 */ 
	public function setEstado($estado)
	{
		$this->estado = $estado;

		return $this;
	}

	/**
	 * Get the value of fecha
	 */ 
	public function getFecha()
	{
		return $this->fecha;
	}

	/**
	 * Set the value of fecha
	 *
	 * @return  self
	 */ 
	public function setFecha($fecha)
	{
		$this->fecha = $fecha;

		return $this;
	}

	/**
	 * Get the value of hora
	 */ 
	public function getHora()
	{
		return $this->hora;
	}

	/**
	 * Set the value of hora
	 *
	 * @return  self
	 */ 
	public function setHora($hora)
	{
		$this->hora = $hora;

		return $this;
	}
}