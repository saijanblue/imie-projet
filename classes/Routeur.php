<?php

    class   Routeur{
        function __construct($page){
        }

        public static function trouverRoute($request){
            $controleur = $this->TrouverEtInstancierControleur($request);
        }

        public static function TrouverEtInstancierControleur($request){
            
        }
    }

?>