<!DOCTYPE html>
<html>
<head>
    <style>
        .left {
            text-align: left;
            width: 50%;
            float: left;
        }
        .right {
            text-align: right;
            width: 50%;
            float: left;
        }
        .center {
            text-align: center;
            width: 100%;
            clear: both;
        }
        .heros {
            color: blue;
        }
        .monstre {
            color: green;
        }
        .egalite {
            background-color: yellow;
        }
        .gagnant {
            font-size: 2em;
            font-weight: bold;
            color: red;
        }
        .health {
            font-size: 2em;
        }
    </style>
</head>
<body>


<h2 class="center">L'arene de combat</h2>

<form class="center" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="submit" id="startButton" name="start" value="Commencer le combat">
    <input type="submit" name="next" value="Tour suivant">
</form>




<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('Chevalier.php');
    require_once('Princesse.php');
    require_once('Ogre.php');
    require_once('Lutin.php');

    // Si le bouton de démarrage a été pressé
    if(isset($_POST['start'])) {
        $chevalier = new Chevalier("Chevalier", 100, 100, 15, 5, 8, 12);
        $princesse = new Princesse("Princesse", 120, 100, 6, 2, 15, 6);
        $ogre = new Ogre("Ogre", 100, 100, 10, 3, 12, 15);
        $lutin = new Lutin("Lutin", 100, 100, 8, 10, 8, 15);
        

        $heros = rand(0, 1) ? $chevalier : $princesse;
        $monstre = rand(0, 1) ? $ogre : $lutin;

        $_SESSION['heros'] = serialize($heros);
        $_SESSION['monstre'] = serialize($monstre);

        echo "<div class='center'>Voici les combattants qui vont se battre : <span class='heros'>" . $heros->getNom() . " (Santé: " . $heros->getSante() . ")</span> contre <span class='monstre'>" . $monstre->getNom() . " (Santé: " . $monstre->getSante() . ")</span></div><br>";

    // Si le bouton du tour suivant a été pressé
    } elseif (isset($_POST['next'])) {
        $heros = unserialize($_SESSION['heros']);
        $monstre = unserialize($_SESSION['monstre']);

        if ($heros->getSante() > 0 && $monstre->getSante() > 0) {
            echo "<div class='left health'> <span class='heros'>" . $heros->getNom() . " (Santé: " . $heros->getSante() . ")</span> </div>";
            echo "<div class='right health'> <span class='monstre'>" . $monstre->getNom() . " (Santé: " . $monstre->getSante() . ")</span> </div><br>";
            
            $desHeros = rand(1, 6);
            $desMonstre = rand(1, 6);
            echo "<div class='left " . strtolower(get_class($heros)) . "'>" . $heros->getNom() . " a lancé le dé et a obtenu " . $desHeros . "</div>";
            echo "<div class='right " . strtolower(get_class($monstre)) . "'>" . $monstre->getNom() . " a lancé le dé et a obtenu " . $desMonstre . "</div><br class='center'>";

            while ($desHeros == $desMonstre) {
                echo "<div class='center egalite'>C'est une égalité, ils relancent les dés!</div><br>";
                $desHeros = rand(1, 6);
                $desMonstre = rand(1, 6);
                echo "<div class='left " . strtolower(get_class($heros)) . "'>" . $heros->getNom() . " a lancé le dé et a obtenu " . $desHeros . "</div>";
                echo "<div class='right " . strtolower(get_class($monstre)) . "'>" . $monstre->getNom() . " a lancé le dé et a obtenu " . $desMonstre . "</div><br class='center'>";
            }

            if ($desHeros > $desMonstre) {
                echo "<div class='center heros'>" . $heros->getNom() . " a fait le plus grand score et attaque " . $monstre->getNom() . "</div><br>";
                $heros->attaquer($monstre);
                echo "<div class='center'>" . $monstre->getNom() . " a maintenant " . $monstre->getSante() . " points de vie.</div><br>";
            } else {
                echo "<div class='center monstre'>" . $monstre->getNom() . " a fait le plus grand score et attaque " . $heros->getNom() . "</div><br>";
                $monstre->attaquer($heros);
                echo "<div class='center'>" . $heros->getNom() . " a maintenant " . $heros->getSante() . " points de vie.</div><br>";
            }

            $_SESSION['heros'] = serialize($heros);
            $_SESSION['monstre'] = serialize($monstre);

            if ($heros->getSante() <= 0) {
                echo "<div class='center gagnant'>" . $monstre->getNom() . " a gagné le combat</div><br>";
            } elseif ($monstre->getSante() <= 0) {
                echo "<div class='center gagnant'>" . $heros->getNom() . " a gagné le combat</div><br>";
            }
        } else {
            if ($heros->getSante() <= 0) {
                echo "<div class='center gagnant'>" . $monstre->getNom() . " a gagné le combat</div><br>";
            } else {
                echo "<div class='center gagnant'>" . $heros->getNom() . " a gagné le combat</div><br>";
            }
        }
    }
}
?>
