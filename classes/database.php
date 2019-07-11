<?php

/*
Nom : Database
Resume : Cette classe permet d'établir une connexion avec la base de donnée.
Description_Technique  : Cette classe utilise l'extension PHP Data Objects (PDO) qui définit une excellente interface pour accéder à une base de données depuis PHP.
Voir la documentation pour plus de detail : https://www.php.net/manual/fr/intro.pdo.php
createur : pwacquez
prérequis install : activer l'extension=php_pdo.dll dans "php.ini"
*/

class Database{
    function __construct($role){
        $this->Role = 'Administrateur';
        //Chargement des identifiants de connexion mysql
        $this->FichierConfDatabase = parse_ini_file("./config/IdentifiantsBDD/$role.ini", $process_sections = false, $scanner_mode = INI_SCANNER_NORMAL);

        $Nombase = $this->FichierConfDatabase['Nombase'];
        $Utilisateur = $this->FichierConfDatabase['NomUtilisateur'];
        $Password = $this->FichierConfDatabase['Password'];

        $this->db = new PDO('mysql:host=mysql-equinveros.alwaysdata.net;dbname='.$Nombase, $Utilisateur, $Password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    public function request($sql){
        //Il faudra ici faire un catch pour récupérer l'érreur SQL en cas de mauvaise manipulation
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }


}

?>