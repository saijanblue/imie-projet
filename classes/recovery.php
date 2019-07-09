<?php
require('../../config/config.php');
?>
<?php

#version 6 phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ('../../PHPMailer-6.0.5/src/PHPMailer.php');
require ('../../PHPMailer-6.0.5/src/SMTP.php');
require ('../../PHPMailer-6.0.5/src/Exception.php');

// traitement si le le formulaire de recovery est envoyé
if(isset($_POST['recovery']) && !empty($_POST['useremail']) ) {

  $useremail = trim($_POST['useremail']);

  if($user->check_if_exists($useremail) == false){

    $error[] = '
    <div class="alert alert-danger" role="alert"> Le compte email fourni n\'existe pas. </div>
    ';
  }

  if(!isset($error)){

    $link = "#";

    $subject = "Réinitialiser votre mot de passe";
    $message = '
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    </head>
    <body>
    <section class="card">
    <div class="mb-5">

    <!-- Start Letter -->
    <div style="width: 100%; background: #eceff4; padding: 50px 20px; color: #514d6a;">

    <div style="max-width: 700px; margin: 0px auto; font-size: 14px">

    <table style="border-collapse: collapse; border: 0; width: 100%; margin-bottom: 20px">
    <tr>
    <td style="vertical-align: top;">
    <img src="#" alt="logo" style="height: 40px" />
    </td>
    <td style="text-align: right; vertical-align: middle;">
    <span style="color: #a09bb9;">
    Réinitialisation du Mot de passe
  </span>
</td>
</tr>
</table>

<div style="padding: 40px 40px 20px 40px; background: #fff;">

  <table style="border-collapse: collapse; border: 0; width: 100%;">
    <tbody><tr>
      <td>
        <div style="padding: 15px 30px; background: #fff; border: 1px solid #acb7bf; border-radius: 5px; margin-bottom: 20px;">

          <br/><br/>Après avoir cliqué sur le lien ci-dessous, vous devrez choisir un mot de passe.
        </div>
        <div style="text-align: center">
          <a href= '.$link.' style="display: inline-block; padding: 11px 30px 6px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #01a8fe; border-radius: 5px">
            Réinitialiser mon mot de passe
          </a>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>
<div style="text-align: center; font-size: 12px; color: #a09bb9; margin-top: 20px">
  <p>
    © '.date('Y').' <a href="#" target="_blank">WISE</a>
    <br>
    Tous Droits Réservés
  </p>
</div>

</div>

</div>
<!-- End Start Letter -->

</div>
</section>
</body>
</html>
';

$contact = 'contact@wise-program.com';

$mail = new PHPMailer(true);              // Passing `true` enables exceptions
$mail->CharSet = "UTF-8";
try {
  //Recipients
  $mail->setFrom($contact);
  // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
  $mail->addAddress($useremail);    // Name is optional

  //Content
  $mail->isHTML(true);  // Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = $message;

  // On envoie le mail
  $sendmail = $mail->send();

  if($sendmail == true)
  {
    $error[] = '
    <div class="alert alert-success" role="alert"> Un email a été envoyé à l\'adresse suivante : '.$useremail.' </div>
    ';
  }

}
catch (Exception $e)
{
  $errMSG = $mail->ErrorInfo;
}

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
