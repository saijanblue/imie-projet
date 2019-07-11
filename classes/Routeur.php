<?php

/*
Description : Permet de trouver une route pour l'utilisateur. la pramètre route dépend de l'url demandée.
Le routeur va Trouver le controleur associé à la vue, c'est le controleur en question qui se chargera de l'affichage et des options associés (pagination, requête ajax, recherche, ect..)

*/

class   Routeur
{
    public function __construct()
    {
        $Url = isset($_GET['url']) ? $_GET['url'] : "Home";
        $Params = array();
        $Params['id'] = isset($_GET['id']) ? $_GET['id'] : "";
        $Url = rtrim($Url, '/');
        $Url = explode('/', $Url);
        $NbParamsUrl = count($Url);
        $Request = array();
        //Notre requête sera formée par une variable de type Array[], ou chaque elèments dépendra du nombre de paramètres dans l'url
        // ex : $Requete[0] = home (correspond en général à la page demandée)
        // ex : $Requete[1] = detail (correspond à une sous-requête pour le controleur home, permettant d'afficher la page home avec un comportement diffèrent suivant l'option)
        // ex : $Requete[2] = "ESEO" (correspond à une option supplèmentaire pouvant être décomposée via controleur)
        switch ($NbParamsUrl) {
            case 1:
                // 1 paramètre dans l'url
                $Request[0] = $Url[0];
                break;
            case 2:
                // 2 paramètres dans l'url
                $Request[0] = $Url[0];
                $Request[1] = $Url[1];
                break;
            case 3:
                $Request[0] = $Url[0];
                $Request[1] = $Url[1];
                $Request[2] = $Url[2];
                break;
            case 4:
                $Request[0] = $Url[0];
                $Request[1] = $Url[1];
                $Request[2] = $Url[2];
                $Request[3] = $Url[3];
                break;
        }
        self::trouverRoute($Request);
    }

    public static function trouverRoute($request)
    {
        self::TrouverEtInstancierControleur($request);
    }

    public static function TrouverEtInstancierControleur($request)
    {
        if ($request[0] === "formation") {
            include 'Formation.php';
            $formation = new Formation();
            if (isset($request[1])) {
                switch ($request[1]) {
                    case "edit":
                        if ($request[2]) {
                            switch ($request[2]) {
                                case "offre":
                                    $formation->editFormation($request[3]);
                                    break;
                                case "domaine":
                                    $formation->editFormationDomaine($request[3]);
                                    break;
                                case "certification":
                                    $formation->editFormationCertification($request[3]);
                                    break;
                                case "contact-formation":
                                    $formation->editFormationContactFormation($request[3]);
                                    break;
                                case "organisme-formation-responsable":
                                    $formation->editFormationOrganismeFormationResponsable($request[3]);
                                    break;
                                case "actions":
                                    $formation->editFormationActions($request[3]);
                                    break;
                                case "modularisation":
                                    $formation->editFormationModularisation($request[3]);
                                    break;
                            }
                        }
                        break;
                    case "new":
                        if ($request[2]){
                            switch($request[2]){
                                case "offre":
                                    $formation->newFormation();
                                    break;
                            }

                        }
                        break;
                    case "import":
                        $formation->import();
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

        if ($request[0] === "Connexion") {
            include("Connexion.php");
            new Connexion();
        }

        if ($request[0] === "Home") {
            include 'Home.php';
            new Home();
        }
    }
}

?>