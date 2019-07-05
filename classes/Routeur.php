<?php

    class   Routeur{
        public function __construct($request){


            $this->trouverRoute($request);
        }

        public static function trouverRoute($request){
            $controleur = $this->TrouverEtInstancierControleur($request);
        }

        public static function TrouverEtInstancierControleur($request){

            switch ($request){
                case "Home":
                    include 'Home.php';
                    new Home();
                break;
                case "Connexion":
                break;
            }
        }
    }

?>