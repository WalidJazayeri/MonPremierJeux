<?php

require_once('Heros.php');

class Princesse extends Heros {

    public function attaquer($adversaire) {
        $attaque = rand(0, 1) ? "Gifle" : "Coup spécial";
        $degats = $attaque == "Gifle" ? 10 : 12;
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats($degats) {
        $this->sante -= $degats;
    }
}

?>
