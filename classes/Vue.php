<?php

/*
Description : Cette classe permet de passer des variables aux vues. Elle va chercher la vue passer en paramètre et lui attribuer des variables.
*/

class Vue{
    public function  __construct(){
    }

    public static function AfficherVue($vue, $arg = false){
        switch($vue){
            case "Header":
            require_once($_SERVER["DOCUMENT_ROOT"]."/public/include/$vue.php");
            break;
            require_once($_SERVER["DOCUMENT_ROOT"]."/public/include/$vue.php");
            case "Footer":
            require_once($_SERVER["DOCUMENT_ROOT"]."/public/include/$vue.php");
            break;
            case "Erreur":
            require_once($_SERVER["DOCUMENT_ROOT"]."/public/include/$vue.php");
            break;
            case "HeaderNav";
            require_once($_SERVER["DOCUMENT_ROOT"]."/public/include/$vue.php");
            break;
            default:
            require_once($_SERVER["DOCUMENT_ROOT"]."/public/vues/$vue.php");
            break;
        }
    }
}

?>