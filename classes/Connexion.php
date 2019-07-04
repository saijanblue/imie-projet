<?php

include 'Vue.php';

class Connexion{
    public function __construct(){
        $this->CheckParams();
    }

    public function CheckParams(){
        if (isset($_POST['Identifiant']) && isset($_POST['Password']) ){

            $db = new database("Utilisateur");
            $db.request($sql);
            print_r($_POST['Identifiant']);
            echo '<br>';
            print_r($_POST['Password']);

            //Appel Database + Verification des identifiants
            exit;            
        }else{
            echo "aucun param";
            Vue::AfficherVue("Header");
            Vue::AfficherVue("Connexion");
            Vue::AfficherVue("Footer");
        }
    }
}

?>