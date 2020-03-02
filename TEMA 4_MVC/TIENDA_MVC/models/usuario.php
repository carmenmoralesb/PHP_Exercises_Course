<?php

class Usuario extends Database{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $conn;
	
	public function __construct($id=null,$nombre=null,$apellidos=null,$email=null,$passwsord=null,
	$rol=null,$imagen=null,$conn=null) {
		$this->conn=parent::conectaDB();

		if (isset($nombre)) {
            $this->nombre=$nombre;
		}

		if (isset($apellidos)) {
            $this->apellidos=$apellidos;
		}

		if (isset($email)) {
            $this->email=$email;
		}

		if (isset($password)) {
            $this->password=$password;
		}

		if (isset($rol)) {
            $this->rol=$rol;
		}

		if (isset($imagen)) {
            $this->imagen=$imagen;
		}
	}


	public function save(){
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->conn->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function login(){
		$usuario = false;
		$email = $this->email;
		$password = $this->password;
		
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->conn->query($sql);
		
		if($login && $login->rowCount() == 1){
			$usuario = $login->fetchObject();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		return $usuario;
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

	/**
	 * Get the value of apellidos
	 */ 
	public function getApellidos()
	{
		return $this->apellidos;
	}

	/**
	 * Set the value of apellidos
	 *
	 * @return  self
	 */ 
	public function setApellidos($apellidos)
	{
		$this->apellidos = $apellidos;

		return $this;
	}

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of password
	 */ 
	public function getPassword()
	{
        return password_hash($this->conn->quote($this->password), PASSWORD_BCRYPT, ['cost' => 4]);	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * Get the value of rol
	 */ 
	public function getRol()
	{
		return $this->rol;
	}

	/**
	 * Set the value of rol
	 *
	 * @return  self
	 */ 
	public function setRol($rol)
	{
		$this->rol = $rol;

		return $this;
	}

	/**
	 * Get the value of imagen
	 */ 
	public function getImagen()
	{
		return $this->imagen;
	}

	/**
	 * Set the value of imagen
	 *
	 * @return  self
	 */ 
	public function setImagen($imagen)
	{
		$this->imagen = $imagen;

		return $this;
	}
}