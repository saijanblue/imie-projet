<?php

/*
Cette classe permet de gérer l'authentification du site. 
CheckAuthentification : Cette fonction statique permet de vérifier si une session utilisateur existe, dans le cas échéant l'utilisateur sera renvoyé vers la page de connexion.
CheckRight : Cette fonction statique permet de vérifier si l'utilisateur courant à les droits nécéssaires pour l'accés à la page demandée ($Request)
En cas d'erreur, les fonctions renveront "FALSE"
*/


class Authentification{

    public $FichierConf_ListeRole; //Fichier de configuration php repertoriant les noms des rôles sur le site
    public $ListeRoles;//Array avec le nom des roles qui ont été inscrit dans le fichier de configuration

    public $FichierConf_Role;//Fichier de configuration php qui correspond au rôle de la variable session
    public $ListePages;//Array avec les diffèrentes pages autorisées pour ce role

    private function __construct() {}

    /*
    Resume: renvoit true en cas d'authentification et false en cas de non connexion
    */
    public static function CheckAuthentification(){
        if (isset($_SESSION['Role'])) 
            return TRUE;
        else
            return FALSE;
    }

    public static function CheckRight($Request, $Role){
        $FichierConf_ListeRole = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config/ConfigurationRoles/ListeRole.ini', TRUE);
        $ListeRoles = $FichierConf_ListeRole['ROLE']['ListeRole'];
        $ListeRoles = explode(',', $ListeRoles);

        
        foreach ($ListeRoles as $RoleInTheList){
            
            if ($RoleInTheList === $Role){
                $FichierConf_Role = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config/ConfigurationRoles/'.$Role.'.ini');
                $ListePages = $FichierConf_Role['PageAfficher'];
                $ListePages = explode(',', $ListePages);
                
                foreach ($ListePages as $Page){
                    if ($Page === $Request)
                        return TRUE;
                }
            }
        }
        return FALSE;
    }
}

?>