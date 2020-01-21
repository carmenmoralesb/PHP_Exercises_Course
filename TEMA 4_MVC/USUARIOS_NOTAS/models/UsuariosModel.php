<?php

class UsuariosModel extends Database {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $fecha;
    private $conn;

    public function __construct($nombre=null,$apellidos=null,$email=null,$password=null) {
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
    }

    public function get_all()  {
        $consulta=$this->conn->query("SELECT * FROM usuarios ORDER BY id DESC");
        return $consulta;
    }

    public function save() {
        $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}',CURDATE());";
       //var_dump($sql);
        $save= $this->conn->exec($sql);
        $result = false;

        if($save) {
            $result=true;
        }
        return $result;
    }

    public function delete() {
       // $sql = "DELETE FROM usuarios  WHERE id = $id;";
        // var_dump($sql);
        // $delete= $this->conn->exec($sql);
        // $result = false;

        // if($delete) {
        //    $result=true;
        //}
        // return $result;

        $sql = "DELETE FROM usuarios  WHERE id = {$this->getId()};";
        var_dump($sql);
        $delete= $this->conn->exec($sql);
        $result = false;

        if($delete) {
            $result=true;
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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

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
}

?>