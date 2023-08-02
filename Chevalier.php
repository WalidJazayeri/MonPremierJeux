<?php

require_once('Heros.php');

class Chevalier extends Heros {

    public function attaquer($adversaire) {
        $attaque = rand(0, 1) ? "Gifle" : "Coup spécial";
        $degats = $attaque == "Gifle" ? 8 : 15;
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats($degats) {
        $this->sante -= $degats;
    }
}

?>
