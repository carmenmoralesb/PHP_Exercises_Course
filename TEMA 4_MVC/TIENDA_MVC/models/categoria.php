<?php

class Categoria extends Database{
	private $id;
	private $nombre;
	private $conn;
	
	public function __construct($id=null,$nombre=null,$conn=null) {
		$this->conn=parent::conectaDB();
		
		if (isset($nombre)) {
            $this->nombre=$nombre;
        }
	}	

	public function obtenerTodas(){
		$categorias = $this->conn->query("SELECT * FROM categorias ORDER BY id DESC;");
		return $categorias;
	}
	
	public function obtenerCategoria(){
		$categoria = $this->conn->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetchObject();
	}
	
	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->conn->query($sql);
		
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
	 * Get the value of nombre
	 */ 
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * Set the value of nombre
	 *
	 * @return  self
	 */ 
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;

		return $this;
	}
}