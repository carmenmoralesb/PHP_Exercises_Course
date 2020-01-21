<?php

class ofertasModel extends Database {
    private $id;
    private $imagen;
    private $titulo;
    private $descripcion;
    private $conn;

    public function __construct($imagen=null,$titulo=null,$descripcion=null) {
        $this->conn=parent::conectaDB();
        if (isset($titulo)) {
            $this->titulo=$titulo;
        }

        if (isset($imagen)) {
            $this->imagen=$imagen;
        }

        if (isset($descripcion)) {
            $this->descripcion=$descripcion;
        }
    }

    public function getOfertas()  {
        $consulta=$this->conn->query("SELECT id,imagen,descripcion,titulo from oferta ORDER BY id DESC");
       // var_dump($consulta);
        return $consulta;
    }

    public function Insert() {
        $sql = "INSERT INTO oferta VALUES (NULL, '{$this->getTitulo()}', '{$this->getImagen()}', '{$this->getDescripcion()}');";
        var_dump($sql);
        $save= $this->conn->exec($sql);
        $result = false;

        if($save) {
            $result=true;
        }
        return $result;
    }

    public function Modificar($id,$imagen,$titulo,$descripcion) {
        //$imagen = $oferta_select->imagen;
        $sql = "UPDATE oferta SET titulo='$titulo',descripcion='$descripcion',imagen='$imagen' WHERE id=$id;";
        var_dump($sql);
        $save= $this->conn->exec($sql);
        $result = false;

        if($save) {
            $result=true;
        }
        return $result;
    }

    public function getOfertasById($id) {
        $consulta =$this->conn->query( "SELECT id,imagen,descripcion,titulo FROM oferta WHERE id=$id");
        var_dump($consulta);
        return $consulta;
    }

    public function Delete() {
        $sql = "DELETE FROM oferta  WHERE id ={$this->getId()}";
        var_dump($sql);
        $save= $this->conn->exec($sql);
        $result = false;

        if($save) {
            $result=true;
        }
        return $result;
    }

    /**
     * Get the value of imagen
     */ 
    public function getimagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setimagen($imagen)
    {
        $this->imagen = $imagen;

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