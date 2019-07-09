<?php
require('../../config/config.php');
?>

<?php
// traitement si le le formulaire d'inscription est envoyé
if(isset($_POST['inscription']) && !empty($_POST['useremail']) && !empty($_POST['password']) ) {

  $useremail = trim($_POST['useremail']);
  $password = trim($_POST['password']);

  if($user->check_if_exists($useremail) == true){

    $error[] = '
    <div class="alert alert-danger">
    Le compte avec l\'email fourni existe déjà. Veuillez utiliser une adresse email différente.
    </div>
    ';
  }

  if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $password))
  {
    $error[] = '
    <div class="alert alert-danger">
    Le mot de passe doit contenir au moins 8 caractères dont une lettre majuscule, une lettre minuscule et un chiffre.
    </div>
    ';
  }


  if(!isset($error)){

    $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
    $statut = "Y";
    $idrole = 1;

    $stmt = $db->prepare('INSERT INTO user(email,password,statut,idrole)
    VALUES(:email,:password,:statut,:idrole)');

    $stmt->execute(array(
      ':email' => $useremail,
      ':password' => $hashedpassword,
      ':statut' => $statut,
      ':idrole' => $idrole
    ));

    echo '<div class="alert alert-success" role="alert"> <span style="color:green;">Votre inscription est terminé</span> </div>';
    exit;

  }

  if(isset($error))
  {
    foreach($error as $error)
    {
      echo $error;
      exit;
    }
  }

}

?>
