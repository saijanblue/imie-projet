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

            //cas = vide

            //Appel Database + Verification des identifiants

            //test
            $email = $_POST['Identifiant'];
            $Password = $_POST['Password'];

            $email = "wacquezp@gmail.com";
            $Password = "password";

            $db     = new database("Utilisateur");
            $sql    = "SELECT password, status, email, id_role FROM user WHERE email = '$email'";
            $result = $db->request($sql);

            /*
            resume : On va vérifier l'état du profil de l'utilisateur, est-il inactif ? supprimé par un admin ? email non valide en base ? mauvais password ? 
            */
            $this->CheckValidity($result);


            exit;            
        }else{
            echo "aucun param";
            Vue::AfficherVue("Header");
            Vue::AfficherVue("Connexion");
            Vue::AfficherVue("Footer");
        }
    }

    public function CheckValidity($result){
        var_dump($result[0]);

        switch($result[0]){
            case "password":
                if ($_POST['Password'] == "password"){
                    continue;
                }else{
                    $arg = array("erreur" => $msg);
                    Vue::AfficherVue("Erreur", $arg);
                }
            break;
            case "email":
            break;
            case "status":
            break;
            case "id_role":
            break;
        }

        exit;

    }
}

?>