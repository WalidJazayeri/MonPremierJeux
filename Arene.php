<?php
class Arene {
    private $hero;
    private $monstre;
    
    public function __construct($hero, $monstre) {
        $this->hero = $hero;
        $this->monstre = $monstre;
    }
    
    public function combattre() {
        while ($this->hero->estVivant() && $this->monstre->estVivant()) {
            $this->hero->attaquer($this->monstre);
            if ($this->monstre->estVivant()) {
                $this->monstre->attaquer($this->hero);
            }
        }
        
        if ($this->hero->estVivant()) {
            return 'Héros';
        } else {
            return 'Monstre';
        }
    }
}
?>
