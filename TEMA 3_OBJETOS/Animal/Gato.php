<?php

include_once 'Animal.php';
// Gato es subclase de Animal utilizando extends

class Gato extends Animal {
    private $raza;
    public function __construct($s="macho", $r="siames") {
        parent:: __construct($s); //llamamos a la clase padre con parent
        $this->raza = $r;
    }
    
    public function __toString() {
        return parent:: __toString() . "<br>Raza: $this->raza";
    }
    
    public function maulla() {
        return "Miauuuu<br>";
    }

    public function jugar($juguete) {
        if ($juguete == "lana") {
            return "Wiiiiiiiiiiiiiiiii<br>";
        } else {
            return "No,gracias<br>";
        }
    }    
    
    public function ronronea() {
        return "mrrrrrr<br>";
    }
    
    public function come($comida) {
        if ($comida == "pescado") {
            return "Ñom ñom ñom<br>";
        } else {
            return "Lo siento, yo solo como pescado<br>";
        }
    }

    /**
     * Get the value of raza
     */ 
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set the value of raza
     *
     * @return  self
     */ 
    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }
}