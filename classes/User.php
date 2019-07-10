<?php

class User{

  public $FichierConf_ListeRole; //Fichier de configuration php repertoriant les noms des rôles sur le site
  public $ListeRoles;//Array avec le nom des roles qui ont été inscrit dans le fichier de configuration

  public $FichierConf_Role;//Fichier de configuration php qui correspond au rôle de la variable session
  public $ListePages;//Array avec les diffèrentes pages autorisées pour ce role

  public $result;//resultat de requête sql

  function __construct(){
    
    if (!isset($GLOBALS["db"])){
      $GLOBALS["db"] = new database("Utilisateur"); 
    }

    //parent::__construct();
  }

  // vérifier s'il exite une session
  public static function is_logged_in(){
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
      return TRUE;
    }
  }

  public function get_user(){
    return $_SESSION['user'];
  }

  // Recuperer le mot de passe de l'utilisateur(par le mail)
  private function get_user_hash($useremail)
  {
    try {
      $result = $GLOBALS["db"]->request('SELECT password FROM user INNER JOIN user_role ON user.idrole = user_role.id WHERE email = :email');
      return $result['password'];
    } catch(PDOException $e) {
      echo '	<div class="alert alert-danger">'.$e->getMessage().'</div>';
    }
  }

  public  function login($email,$password){

    //$hashed = $this->get_user_hash($useremail);
    return true;
    $sql    = "SELECT password, status, email, id_role, deleted FROM user WHERE email = '$email'";
    $result = $GLOBALS["db"]->request($sql);

    if ($this->CheckValidity($result) == TRUE){
      if ( $this->SetSession($result[0]['id_role']) == TRUE){
       echo 'Identification réussie, variable session instanciée ! mise en place du cookie user ';
       header( "Refresh:2; url=http://imie-projet/Home");
       }      
    }
    
    $id_role = $result[0]['id_role'];

    $sql = "select id, libelle from user_role where id = $id_role";
    
    $result_UseRole = $GLOBALS["db"]->request($sql);
    $role = $result_UseRole[0]['libelle'];
    

    
    /*
    if($this->password_verify($password,$hashed) == 1){
      $_SESSION['loggedin'] = true;
      return true;
    }
    */
  }

  public function SetSession($id_role){
    $sql = "select id, libelle from user_role where id = $id_role";
    $result_UseRole = $GLOBALS['db']->request($sql);
    $role = $result_UseRole[0]['libelle'];
    $_SESSION['Role']=$role;
    $_SESSION['loggedin']=TRUE;
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

  // Pour se déconnecter
  public function logout(){
    session_destroy();
  }

  // On vérifie si l'adresse mail existe
  public function check_if_exists($useremail){
    try {
      $result = $GLOBALS["db"]->request('SELECT password FROM user INNER JOIN user_role ON user.idrole = user_role.id WHERE email = :email');
      return count($result);;
    } catch(PDOException $e) {
      echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }

  // On liste les utilisateurs
  public function fetch_users(){
    $result = $GLOBALS["db"]->request("SELECT * FROM user INNER JOIN user_role ON user.idrole = user_role.id");
    $this->data [] = $userData;
    return $userData;
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
