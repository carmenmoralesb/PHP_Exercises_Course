<?php

class NotasModel extends Database {
    private $id;
    private $usuario_id;
    private $titulo;
    private $descripcion;
    private $conn;

    public function __construct($usuario_id=null,$titulo=null,$descripcion=null) {
        $this->conn=parent::conectaDB();
        if (isset($titulo)) {
            $this->titulo=$titulo;
        }

        if (isset($usuario_id)) {
            $this->usuario_id=$usuario_id;
        }

        if (isset($descripcion)) {
            $this->descripcion=$descripcion;
        }
    }

    public function get_all()  {
        $consulta=$this->conn->query("SELECT usuario_id,titulo,descripcion,fecha from notas ORDER BY fecha DESC");
        return $consulta;
    }

    public function save() {
        $sql = "INSERT INTO notas VALUES (NULL, {$this->getUsuario_id()}, '{$this->getTitulo()}', '{$this->getDescripcion()}',CURDATE());";
        $save= $this->conn->exec($sql);
        $result = false;

        if($save) {
            $result=true;
        }
        return $result;
    }

    public function notas_usuario($id) {
        $consulta =$this->conn->query( "SELECT usuarios.nombre AS nombre,notas.titulo,notas.descripcion FROM notas INNER JOIN usuarios ON  notas.usuario_id=usuarios.id WHERE usuarios.id=$id;");
        return $consulta;
    }

    public function delete() {
        $sql = "DELETE nota from notas  WHERE id = $id";
        $save= $this->conn->exec($sql);
        $result = false;

        if($save) {
            $result=true;
        }
        return $result;
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
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
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
}