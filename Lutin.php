<?php

require_once('Monstre.php');

class Lutin extends Monstre {

    public function attaquer($adversaire) {
        $attaque = rand(0, 1) ? "Rugir" : "Coup de saleté";
        $degats = $attaque == "Rugir" ? 10 : 4;
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats($degats) {
        $this->sante -= $degats;
    }
}

?>
