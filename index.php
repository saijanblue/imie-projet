<?php

include "classes/authentification.php";
//On démarre une session
session_start();

//On décompose l'url, ceci permettra à terme de gérer les sous-requêtes, ex : \home\tab1\detail

$Url            = isset($_GET['url']) ? $_GET['url'] : "Home";
$Url            = rtrim($Url, '/');
$Url            = explode('/', $Url);
$NbParamsUrl    = count($Url);

//Notre requête sera formée par une variable de type Array[], ou chaque elèments dépendra du nombre de paramètres dans l'url
// ex : $Requete[0] = home (correspond en général à la page demandée)
// ex : $Requete[1] = detail (correspond à une sous-requête pour le controleur home, permettant d'afficher la page home avec un comportement diffèrent suivant l'option)
// ex : $Requete[2] = "ESEO" (correspond à une option supplèmentaire pouvant être décomposée via controleur)
switch ($NbParamsUrl){
    case 1:
        // 1 paramètre dans l'url
        $Request = $Url[0]; 
    break;
    case 2:
        // 2 paramètres dans l'url
        $Request[]  = $Url[0]; 
        $Request[]  = $Url[1]; 
    break;
}

//Cas ou la page est une page de connexion
if ($Url[0] == "Connexion"){
    include("classes/Connexion.php");
    new Connexion();
}

/*
Resume : Verification des Variables sessions && vérification des droits
2 cas possibles : 
    1er cas : l'utilisateur est authentifié, dans ce cas on va instancier le routeur, qui selon le rôle renseigné en session et ces droits d'accés va attribuer une route.
    2em cas : l'utilisateur n'est pas authentifié dans ce cas on va rediriger l'utilisateur vers l'écran de connexion. Ceci afint d'obtenir une session utilisateur. 
Note : les erreurs de formulaire pour l'écran de connexion est géré par le controleur "connexion" présent dans "./classes"
*/
if (Authentification::CheckAuthentification() === TRUE ){
    if (Authentification::CheckRight($Request, $_SESSION["Role"]) === TRUE ){
        require_once($_SERVER['DOCUMENT_ROOT'].'/classes/Routeur.php');
        new Routeur($Request);
    }
}else{
    require_once("classes/Connexion.php");
    new Connexion();
}
?>