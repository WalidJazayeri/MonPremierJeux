<?php

require_once('Monstre.php');

class Ogre extends Monstre {

    public function attaquer($adversaire) {
        $attaque = rand(0, 1) ? "Rugir" : "Coup de saleté";
        $degats = $attaque == "Rugir" ? 5 : 15;
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats($degats) {
        $this->sante -= $degats;
    }
}

?>
