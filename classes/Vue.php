<?php

/*
Description : Cette classe permet de passer des variables aux vues. Elle va chercher la vue passer en paramètre et lui attribuer des variables.
*/

class Vue{
    public function  __construct(){
    }

    public static function AfficherVue($vue, $arg = false){
        require_once("./vues/$vue.php");
    }
}

?>