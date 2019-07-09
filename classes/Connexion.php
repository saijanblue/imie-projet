<?php

/*
Description : Cette classe permet la création de la page de connexion utilisateur.
elle en controle les données du formulaire et permet également de mettre en place une session utilisateur.
fonctions:
CheckParams() : Vérifie les données du formulaire de connexion, réalise un appel à la base de donnée et vérifie les identifiants utilisateur
SetSession() : Vérifie le rôle utilisateur en base de donnée et instancie un fichier de configuration appropriée à l'utilisateur concernée.
CheckValidity() : gére les messages d'erreur du formulaire, et renvoit les erreurs suivantes 
 1 : email non renseigné,
 2 : password incorect,
 3 : profil inactif trop longtemps,
 4 : profil supprimé
*/

//mettre database en variable globale !
include "Vue.php";
include "database.php";

class Connexion{

    public $email;//l'adresse email utilisateur
    public $password;//la mdp utilisateur
    public $sql;//la requête sql <string>
    public $result;//le résultat de la requête sql en brut avec les diffèrents libellés
    public $result_UseRole;//Le résultat Sql de la requête permettant de récupérer le rôle de l'utilisateur <array>
    public $role;//le role de l'utilisateur récupérée en base de donnée <string>
    public $arg;//paramètre à renseigner à la vue, on transmet une variable à la vue 

    public function __construct(){
        $this->CheckParams();
    }

    public function CheckParams(){
        if (isset($_POST['Identifiant']) && isset($_POST['Password']) ){
            $email = $_POST['Identifiant'];
            $Password = $_POST['Password'];
            $user =  new User();
            $user->login($email, $Password);
        }else{
            Vue::AfficherVue("Header");
            Vue::AfficherVue("Connexion");
        }
    }
}

?>