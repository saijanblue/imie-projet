<?php

/*
Description : Permet de trouver une route pour l'utilisateur. la pramètre route dépend de l'url demandée.
Le routeur va Trouver le controleur associé à la vue, c'est le controleur en question qui se chargera de l'affichage et des options associés (pagination, requête ajax, recherche, ect..)

*/

class   Routeur {
    public function __construct($request, $Params = false) {
        self::trouverRoute($request, $Params);
    }

    public static function trouverRoute($request, $Params = false) {
        self::TrouverEtInstancierControleur($request, $Params);
    }

    public static function TrouverEtInstancierControleur($request, $Params = false) {
        /*if ($request[0] . "/" . $request[1] . "/" . $request[2] === "formation/edit/offre") {
            include 'Formation.php';
            $formation = new Formation();
            if (isset($request[3])) {
                $formation->editFormation($request[3]);
            }
        }*/

        if ($request[0] === "formation") {
            include 'Formation.php';
            $formation = new Formation();
            if ($request[1]) {
                switch ($request[1]) {
                    case "edit":
                        if ($request[2]) {
                            switch ($request[2]) {
                                case "offre":
                                    $formation->editFormation($request[3]);
                                    break;
                            }
                        }
                        break;
                    case "delete":
                        break;
                    case "actions":
                        break;
                }
            } else {
                $formation->gridFormation();
            }
        }


        switch ($request) {
            case "Home":
                include 'Home.php';
                new Home();
                break;
            case "Connexion":
                break;
            case "formation":
                include 'Formation.php';
                $formation = new Formation();
                $formation->gridFormation();
                break;
            case "formation/edit/offre":
                include 'Formation.php';
                $formation = new Formation();
                if (isset($Params['id'])) {
                    $formation->editFormation(1);
                }
                break;
            default:
                break;
        }
    }
}

?>