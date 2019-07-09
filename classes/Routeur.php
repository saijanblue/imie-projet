<?php

/*
Description : Permet de trouver une route pour l'utilisateur. la pramètre route dépend de l'url demandée.
Le routeur va Trouver le controleur associé à la vue, c'est le controleur en question qui se chargera de l'affichage et des options associés (pagination, requête ajax, recherche, ect..)

*/
    class   Routeur{
        public function __construct($request){
            self::trouverRoute($request);
        }

        public static function trouverRoute($request){
            $controleur = self::TrouverEtInstancierControleur($request);
        }

        public static function TrouverEtInstancierControleur($request){

            switch ($request){
                case "Home":
                    include 'Home.php';
                    new Home();
                break;
                case "Connexion":
                break;
                case "Formation":
                    include 'Formation.php';
                    new Formation();
                break;
            }
        }
    }

?>