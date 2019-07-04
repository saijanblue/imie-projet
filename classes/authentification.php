<?php

class Authentification{
    private function __construct() {}

    /*
    Resume: renvoit true en cas d'authentification et false en cas de non connexion
    */
    public static function CheckAuthentification(){
        if ( isset( $_SESSION['Utilisateur']) == "" &&  isset($_SESSION['Role'])== "") 
            return FALSE;
        else
            return TRUE;
    }

    public static function CheckRight($Request, $Role){
        $FichierConf_ListeRole = parse_ini_file('../config/ConfigurationRoles/ListeRole.ini', TRUE);
        $ListeRoles = $FichierConf_ListeRole['ROLE']['ListeRole'];
        $ListeRoles = explode(',', $ListeRoles);

        foreach ($ListeRoles as $RoleInTheList){
            if ($RoleInTheList == $Role){
                $FichierConf_Role = parse_ini_file('../config/ConfigurationRoles/'.$Role.'.php');
                $ListePages = $FichierConf_Role['VUE']['PageAfficher'];
                foreach ($ListePages as $Page){
                    if ($Page == $Request[0])
                        return true;
                    else
                        return false;
                }
            }
            else
                return false;
        }
    }
}

?>