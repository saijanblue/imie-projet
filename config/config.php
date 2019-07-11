<?php
ob_start();
session_start();

//Parametres de connexion à la base de données
define('DBHOST','mysql-equinveros.alwaysdata.net');
define('DBUSER','equinveros_wise');
define('DBPASS','101IMIE49');
define('DBNAME','equinveros_wise');


$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//timezone
date_default_timezone_set('Europe/Paris');


//Charger les classes
function __autoload($class) {

  $class = strtolower($class);

  //On ajuste le chemin de la l'action en fonction du niveau d'appel - niveau 0
  $classpath = 'classes/class.'.$class . '.php';
  if ( file_exists($classpath)) {
    require_once $classpath;
  }

  //On ajuste le chemin de la l'action en fonction du niveau d'appel - niveau 1
  $classpath = '../classes/class.'.$class . '.php';
  if ( file_exists($classpath)) {
    require_once $classpath;
  }

  //On ajuste le chemin de la l'action en fonction du niveau d'appel - niveau 2
  $classpath = '../../classes/class.'.$class . '.php';
  if ( file_exists($classpath)) {
    require_once $classpath;
  }

}

$user = new ModelUser($db);


?>
