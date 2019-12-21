<?php

/*
Crea la clase Abstracta Vehiculo, así como las clases Bicicleta y Coche como subclases de
la primera.
*/

abstract class Vehiculo {
  //atributo de instancia
  private $kmRecorridos; 
  
  //atributos de clase
  private static $vehiculosCreados = 0; 
  private static $kmTotales = 0; 
  
  
  public function __construct() {
    $this->kmRecorridos = 0;
    self::$vehiculosCreados++;
  }
  
  //métodos de clase

  public function anda($k) {
    echo "Voy a recorrer " . $k . " km. <br>"
      . "buuuuummmmmm<br>";
    self::incrementaKm($k);
    echo "Ya he recorrido " . $this->kmRecorridos . " kilómetros";
  }
  
  public function incrementaKm($k) {
    $this->kmRecorridos += $k;
    self::$kmTotales += $k;
  }

  /**
   * Get the value of kmRecorridos
   */ 
  public function getKmRecorridos()
  {
    return $this->kmRecorridos;
  }

  /**
   * Set the value of kmRecorridos
   *
   * @return  self
   */ 
  public function setKmRecorridos($kmRecorridos)
  {
    $this->kmRecorridos = $kmRecorridos;

    return $this;
  }

  /**
   * Get the value of vehiculosCreados
   */ 
  public function getVehiculosCreados()
  {
    return $this->vehiculosCreados;
  }

  /**
   * Set the value of vehiculosCreados
   *
   * @return  self
   */ 
  public function setVehiculosCreados($vehiculosCreados)
  {
    $this->vehiculosCreados = $vehiculosCreados;

    return $this;
  }

  /**
   * Get the value of kmTotales
   */ 
  public function getKmTotales()
  {
    return $this->kmTotales;
  }

  /**
   * Set the value of kmTotales
   *
   * @return  self
   */ 
  public function setKmTotales($kmTotales)
  {
    $this->kmTotales = $kmTotales;

    return $this;
  }
}