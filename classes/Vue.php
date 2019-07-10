<?php

/*
Description : Cette classe permet de passer des variables aux vues. Elle va chercher la vue passer en paramètre et lui attribuer des variables.
*/

class Vue {
    public function __construct() {
    }

    public static function AfficherVue($vue, $arg = false) {
        switch ($vue) {
            case "Header":
                include("./public/include/$vue.php");
                break;
            case "Footer":
                include("./public/include/$vue.php");
                break;
            case "Erreur":
                include("./public/include/$vue.php");
                break;
            case "HeaderNav";
                include("./public/include/$vue.php");
                break;
            default:
                include("./public/vues/$vue.php");
                break;
        }
    }
}

?>