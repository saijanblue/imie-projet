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

            //Appel Database + Verification des identifiants
            $email = $_POST['Identifiant'];
            $Password = $_POST['Password'];

            $sql    = "SELECT password, status, email, id_role, deleted FROM user WHERE email = '$email'";
            $result = $GLOBALS["db"]->request($sql);

            /*
            resume : On va vérifier l'état du profil de l'utilisateur, est-il inactif ? supprimé par un admin ? email non valide en base ? mauvais password ? 
            */
            if ($this->CheckValidity($result) == TRUE){
               if ( $this->SetSession($result[0]['id_role']) == TRUE){
                echo 'Identification réussie, variable session instanciée ! mise en place du cookie user ';
                header( "Refresh:2; url=http://imie-projet/Home");
                }      
            }
        }else{
            echo "aucun param";
            Vue::AfficherVue("Header");
            Vue::AfficherVue("Connexion");
        }
    }

    public function SetSession($id_role){
        $sql = "select id, libelle from user_role where id = $id_role";
        $result_UseRole = $GLOBALS["db"]->request($sql);
        $role = $result_UseRole[0]['libelle'];

        $_SESSION['Role']=$role;
        return TRUE;
    }

    public function CheckValidity($result){
        
        if (count($result) == 0){
            $arg = array("erreur" => "Votre email n'a pas été enregistré  !");
            Vue::AfficherVue("Erreur", $arg);
            header( "Refresh:3; url=http://imie-projet/connexion");
            return FALSE;
        }
        else if ($result[0]['password'] != $_POST['Password']){
            $arg = array("erreur" => "Mauvais mot de passe !");
            Vue::AfficherVue("Erreur", $arg);
            header( "Refresh:3; url=http://imie-projet/connexion");
            return FALSE;
        }
        else if ($result[0]['status'] == "inactif"){
            $arg = array("erreur" => "Votre profil à été inactif trop longtemps !");
            Vue::AfficherVue("Erreur", $arg);
            header( "Refresh:3; url=http://imie-projet/connexion");
            return FALSE;
        }
        else if ($result[0]['deleted'] == "oui"){
            $arg = array("erreur" => "Votre profil à été supprimé");
            Vue::AfficherVue("Erreur", $arg);
            header( "Refresh:3; url=http://imie-projet/connexion");
            return FALSE;
        }

        return TRUE;
    }
}

?>