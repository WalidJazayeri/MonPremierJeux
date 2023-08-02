<?php

abstract class Personnage {
    protected $nom;
    protected $sante;
    protected $endurance;

    public function __construct($nom, $sante, $endurance) {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->endurance = $endurance;
    }

    public function getNom() {
        return $this->nom;
    }
    
    public function getSante() {
        return $this->sante;
    }

    public function recevoirDegats($degats) {
        $this->sante -= $degats;
    }

    abstract public function attaquer($adversaire);
}


?>
