<?php

//mettre database en variable globale !
include "Vue.php";
include "database.php";

class Connexion{
    public function __construct(){
        $this->CheckParams();
    }

    public function CheckParams(){
        if (isset($_POST['Identifiant']) && isset($_POST['Password']) ){

            //Appel Database + Verification des identifiants
            $email = $_POST['Identifiant'];
            $Password = $_POST['Password'];

            $this->db     = new database("Utilisateur");
            $sql    = "SELECT password, status, email, id_role, deleted FROM user WHERE email = '$email'";
            $result = $this->db->request($sql);

            /*
            resume : On va vérifier l'état du profil de l'utilisateur, est-il inactif ? supprimé par un admin ? email non valide en base ? mauvais password ? 
            */
            if ($this->CheckValidity($result) == TRUE){
               if ( $this->SetSession($result[0]['id_role']) == TRUE){
                echo 'Identification réussie, variable session instanciée ! mise en place du cookie user ';
                header( "Refresh:2; url=http://imie-projet/Home");
            }      
            }
            exit;            
        }else{
            echo "aucun param";
            Vue::AfficherVue("Header");
            Vue::AfficherVue("Connexion");
            Vue::AfficherVue("Footer");
        }
    }

    public function SetSession($id_role){
        $sql = "select id, libelle from user_role where id = $id_role";
        $result_UseRole = $this->db->request($sql);
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