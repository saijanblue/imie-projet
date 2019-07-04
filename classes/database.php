<?php

/*
Nom : Database
Resume : Cette classe permet d'établir une connexion avec la base de donnée.
Description_Technique  : Cette classe utilise l'extension PHP Data Objects (PDO) qui définit une excellente interface pour accéder à une base de données depuis PHP.
Voir la documentation pour plus de detail : https://www.php.net/manual/fr/intro.pdo.php
createur : pwacquez
prérequis install : activer l'extension=php_pdo.dll dans "php.ini"
*/

class database{
    function __construct(){
        $role = 'Admin';
        //Chargement des identifiants de connexion mysql
        $FichierConfDatabase = parse_ini_file("./config/Database/identifiantBDD$role.ini", TRUE);
        echo 'lancement de la database';
        //connexion Mysql
        $dbh = new PDO('mysql:host=localhost;dbname='.$FichierConfDatabase['IdentifiantsBDD']['NomBase'], $FichierConfDatabase['IdentifiantsBDD']['Utilisateur'], $FichierConfDatabase['IdentifiantsBDD']['Password']);
    }


}

?>