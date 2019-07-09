<?php
$pagetitle = "Inscription"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?php echo $pagetitle; ?></title>
  <meta content="Admin Dashboard" name="description" />
  <meta content="Themesbrand" name="author" />
  <link rel="shortcut icon" href="public/assets/images/favicon.ico">

  <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="public/assets/css/metismenu.min.html" rel="stylesheet" type="text/css">
  <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css">
  <link href="public/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

  <!-- Begin page -->
  <div class="wrapper-page">
    <div class="card">
      <div class="card-body">

        <h3 class="text-center m-0">
          <a href="index.php" class="logo logo-admin"><img src="public/assets/images/logo.png" height="30" alt="logo"></a>
        </h3>

        <div class="p-3">
          <h4 class="text-muted font-18 m-b-5 text-center">Inscription</h4>
          <p class="text-muted text-center">Créer votre compte wise maintenant.</p>

          <div class="statusMsg"></div>

          <form class="form-horizontal m-t-30" action="#">

            <div class="form-group">
              <label for="useremail">Email</label>
              <input type="email" class="form-control" id="useremail" placeholder="Saisir votre email">
            </div>

            <div class="form-group">
              <label for="userpassword">Password</label>
              <input type="password" class="form-control" id="userpassword" placeholder="Saisir votre mot de passe">
            </div>

            <div class="form-group">
              <label for="userpasswordconfirm">Password</label>
              <input type="password" class="form-control" id="userpasswordconfirm" placeholder="Resaisir votre mot de passe">
            </div>

            <div class="form-group row m-t-20">
              <div class="col-12 text-right">
                <button class="btn btn-primary w-md waves-effect waves-light" onclick="inscription()"  type="submit">Enregistrer</button>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>

    <div class="m-t-40 text-center">
      <p>Déjà inscrit? <a href="login.php" class=" text-primary"> Connexion </a> </p>
      <p>© 2019 WISE - Uxperiment</p>
    </div>
  </div>
  <!-- jQuery  -->
  <script src="public/assets/js/jquery.min.js"></script>
  <script src="public/assets/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/js/metisMenu.min.html"></script>
  <script src="public/assets/js/jquery.slimscroll.js"></script>
  <script src="public/assets/js/waves.min.js"></script>

  <script src="public/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

  <!-- App js -->
  <script src="public/assets/js/app.js"></script>


  <!-- inscription traitement -->
  <script type="text/javascript">
    function inscription(){
      var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      var useremail = $('#useremail').val();
      var password = $('#userpassword').val();
      var passwordconfirm = $('#userpasswordconfirm').val();
      if(useremail.trim() == '' ){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert"> <span style="color:red;">Merci de saisir votre adresse mail.</span> </div>');
        $('#useremail').focus();
        return false;
      }else if(useremail.trim() != '' && !reg.test(useremail)){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert"> <span style="color:red;">Merci de saisir une adresse valide.</span> </div>');
        $('#useremail').focus();
        return false;
      }else if(password.trim() == '' ){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert"> <span style="color:red;">Merci de saisir votre mot de passe.</span> </div>');
        $('#userpassword').focus();
        return false;
      }else if(passwordconfirm.trim() == '' ){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert"> <span style="color:red;">Merci de confirmer votre mot de passe.</span> </div>');
        $('#userpassword').focus();
        return false;
      }else if(password.trim() != passwordconfirm.trim() ){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert"> <span style="color:red;">Les mots de passe ne sont pas identiques.</span> </div>');
        $('#userpassword').val('');
        $('#userpasswordconfirm').val('');
        $('#userpassword').focus();
        return false;
      }
      else{
        $.ajax({
          type:'POST',
          url:'custom/inscription.php',
          // data:{user_email:user_email, password:password},
          data:'inscription=1&useremail='+useremail+'&password='+password,
          success:function(msg){
            $('.statusMsg').html(msg);
          }
        });
      }
    }
  </script>

</body>
</html>
