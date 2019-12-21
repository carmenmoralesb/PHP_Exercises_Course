<?php

include_once 'Vehiculo.php';

class Coche extends Vehiculo {
    private $numpuertas;
    private $marca;

    public function __construct($n="4",$m="Seat") {
        parent:: __construct(); //llamamos a la clase padre con parent
        $this->marca = $m;
        $this->numpuertas = $n;
    }
    
    public function __toString() {
        return "<br>Número de puertas: $this->numpuertas";
    }

    public function anda($k) {
        echo "Voy a recorrer " . $k . " km.";
        parent::incrementaKm($k);
        echo "Ya he recorrido " . $this->getKmRecorridos() . " kilómetros";
      }
    
    public function quemaRueda() {
        echo "ÑÑÑÑÑÑÑIAUMMMMMMMMMMMMMMM!!";
  }

    /**
     * Get the value of numpuertas
     */ 
    public function getNumpuertas()
    {
        return $this->numpuertas;
    }

    /**
     * Set the value of numpuertas
     *
     * @return  self
     */ 
    public function setNumpuertas($numpuertas)
    {
        $this->numpuertas = $numpuertas;

        return $this;
    }
}