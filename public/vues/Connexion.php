<form action=<?php print_r("http://imie-projet/Connexion"); ?> method="post">
    <div class="form-group">
      <label for="Identifiant">Identifiant</label>
      <input type="text" class="form-control" id="Identifiant"  name='Identifiant' placeholder="Rentrez votre identifiant ici !">
      <small id="IdentifiantHelp" class="form-text text-muted" >Ceci restera secret !</small>
    </div>
    <div class="form-group">
      <label for="Password">Mot De Passe</label>
      <input type="password" class="form-control" id="Password" name='Password' placeholder="Rentrez votre mot de passe ici ">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1" name='CheckboxRemember'>Se souvenir de moi !</label>
    </div>
    <button type="submit" class="btn btn-primary">Envoyez !</button>
</form>