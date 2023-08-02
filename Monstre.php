<?php

require_once('Personnage.php');

abstract class Monstre extends Personnage {
    protected $musculation;
    protected $lachete;
    protected $mechancete;
    protected $armes;

    public function __construct($nom, $sante, $endurance, $musculation, $lachete, $mechancete, $armes) {
        parent::__construct($nom, $sante, $endurance);
        $this->musculation = $musculation;
        $this->lachete = $lachete;
        $this->mechancete = $mechancete;
        $this->armes = $armes;
    }
    
}

?>
