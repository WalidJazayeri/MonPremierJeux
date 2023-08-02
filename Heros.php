<?php

require_once('Personnage.php');

abstract class Heros extends Personnage {
    protected $musculation;
    protected $lachete;
    protected $intelligence;
    protected $epee;

    public function __construct($nom, $sante, $endurance, $musculation, $lachete, $intelligence, $epee) {
        parent::__construct($nom, $sante, $endurance);
        $this->musculation = $musculation;
        $this->lachete = $lachete;
        $this->intelligence = $intelligence;
        $this->epee = $epee;
    }
    
}

?>
