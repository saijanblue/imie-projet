<?php

class Vue{
    public function  __construct(){
    }

    public static function AfficherVue($vue, $arg = false){
        require_once("./vues/$vue.php");
    }
}

?>