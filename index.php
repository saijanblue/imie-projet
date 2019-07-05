<?php

include "classes/authentification.php";
session_start();

$Url            = isset($_GET['url']) ? $_GET['url'] : "Home";
$Url            = rtrim($Url, '/');
$Url            = explode('/', $Url);
$NbParamsUrl    = count($Url);

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

if ($Url[0] == "Connexion"){
    include("classes/Connexion.php");
    new Connexion();
}

/*
resume : Verification des Variables sessions & vérification des droits
*/
if (Authentification::CheckAuthentification() == TRUE ){
    
    if (Authentification::CheckRight($Request, $_SESSION["Role"]) == TRUE ){
        include ('../classes/Routeur.php');
        new Routeur($Request);
    }
}else{
    require_once("classes/Connexion.php");
    new Connexion();
}
?>