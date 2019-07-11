<?php

include "classes/User.php";
include "classes/database.php";
//On démarre une session
session_start();


//Cas ou la page est une page de connexion

/*
Resume : Verification des Variables sessions && vérification des droits
2 cas possibles : 
    1er cas : l'utilisateur est authentifié, dans ce cas on va instancier le routeur, qui selon le rôle renseigné en session et ces droits d'accés va attribuer une route.
    2em cas : l'utilisateur n'est pas authentifié dans ce cas on va rediriger l'utilisateur vers l'écran de connexion. Ceci afint d'obtenir une session utilisateur. 
Note : les erreurs de formulaire pour l'écran de connexion est géré par le controleur "connexion" présent dans "./classes"
*/
//if (User::is_logged_in() === TRUE ){
//    if (User::CheckRight($Request, $_SESSION["Role"]) === TRUE ){
        require_once('classes/Routeur.php');
        $GLOBALS["db"] = new database("Utilisateur");
        new Routeur();
//    }
//}else{
//    require_once("classes/Connexion.php");
//    new Connexion();
//}
?>