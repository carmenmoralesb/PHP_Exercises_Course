<?php

/*
Ejercicio 1. 

Crea las clase Abstracta Animal con la variable de instancia sexo y la subclase Gato con
la variable de instancia raza.

*/

abstract class Animal {
  private $nombre;
  private $sexo; 
  
  public function __construct($n, $s = 'macho') {
    $this->nombre = $n;
    $this->sexo = $s;
  }

  public function __toString() {
    return "Nombre: $this->nombre Sexo: $this->sexo";
    }

  public function come($comida) {
    echo "Ñom Ñom" . $comida;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Get the value of sexo
   */ 
  public function getSexo()
  {
    return $this->sexo;
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
   * Set the value of sexo
   *
   * @return  self
   */ 
  public function setSexo($sexo)
  {
    $this->sexo = $sexo;

    return $this;
  }
}