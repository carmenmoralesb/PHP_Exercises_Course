<?php
/**
 * Descripción de la Clase Bicicleta
 *
 */
include_once 'Vehiculo.php';
class Bicicleta extends Vehiculo {
    private $tipo;
    private $pinon;

    public function __construct($t="paseo",$p="fijo") {
        parent:: __construct(); //llamamos a la clase padre con parent
        $this->tipo =$t;
        $this->pinon = $p;
    }

        
    public function __toString() {
        return "<br>Tipo: $this->tipo Pinón $this->pinon";
    }
    
    public function anda($k) {
        echo "Voy a recorrer " . $k . " km.";
        parent::incrementaKm($k);
        echo "Se han recorrido " . $this->getKmRecorridos() . " kilómetros";
    }

    public function haceCaballito() {
        echo "WEEEEEEEEEEEEEE";
  }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of pinon
     */ 
    public function getPinon()
    {
        return $this->pinon;
    }

    /**
     * Set the value of pinon
     *
     * @return  self
     */ 
    public function setPinon($pinon)
    {
        $this->pinon = $pinon;

        return $this;
    }
}