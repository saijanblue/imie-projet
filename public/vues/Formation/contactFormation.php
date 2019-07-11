<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="row">

                <div id="tree" class="col-md-11">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/offre/<?php echo($arg['formation']->getId()) ?>">Offre
                                de
                                formation</a>
                            <ul class="list-group list-group-flush" style="list-style:none;">
                                <li class="list-group-item">
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/domaine/<?php echo($arg['formation']->getId()) ?>">Domaine
                                        de
                                        la formation</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/certification/<?php echo($arg['formation']->getId()) ?>">Certifications</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/contact-formation/<?php echo($arg['formation']->getId()) ?>"><strong>Contact
                                        de
                                            la formation</strong></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/organisme-formation-responsable/<?php echo($arg['formation']->getId()) ?>">Organisme
                                        de
                                        formation responsable</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/actions/<?php echo($arg['formation']->getId()) ?>">Actions
                                        de formation</a>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Lieu de formation</li>
                                        <li class="list-group-item">Adresse d'information</li>
                                        <li class="list-group-item">Organisme formateur</li>
                                        <li class="list-group-item">Irganismes financeurs</li>
                                        <li class="list-group-item">Sessions</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/modularisation/<?php echo($arg['formation']->getId()) ?>">Modularisation</a>
                                </li>

                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-7">

            <form style="margin-bottom: 40px" action="formation/update/" .<?php echo($arg['formation']->getId()) ?>
                  method="post" class="form">
                <fieldset>
                    <legend>Coordonnées du contact</legend>
                    <div class="form-group">
                        <label for="civilite">Civilité</label>
                        <select id="civilite" class="custom-select">
                            <option>---</option>
                            <option>M.</option>
                            <option>Mme.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Entrez le prénom du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez le nom du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="tel_fixe">Téléphone fixe</label>
                        <input type="text" class="form-control" id="tel_fixe"
                               placeholder="Entrez le numéro de téléphone fixe du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" id="fax" placeholder="Entrez le fax du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Entrez l'e-mail du contact"
                               value="">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Adresse du contact</legend>
                    <div class="form-group">
                        <label for="ligne_1">Ligne*</label>
                        <input type="text" class="form-control" id="ligne_1" placeholder="Entrez l'adresse du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label hidden for="ligne_2">Ligne</label>
                        <input type="text" class="form-control" id="ligne_2"
                               value="">
                    </div>
                    <div class="form-group">
                        <label hidden for="ligne_3">Ligne</label>
                        <input type="text" class="form-control" id="ligne_3"
                               value="">
                    </div>
                    <div class="form-group">
                        <label hidden for="ligne_4">Ligne</label>
                        <input type="text" class="form-control" id="ligne_4"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="cp">Code postal</label>
                        <input type="text" class="form-control" id="cp" placeholder="Entrez le code postal du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" placeholder="Entrez la ville du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="dpt">Département</label>
                        <input type="text" class="form-control" id="dpt" placeholder="Entrez le département du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="insee_commune">Code INSEE commune</label>
                        <input type="text" class="form-control" id="insee_commune"
                               placeholder="Entrez le code INSEE de la commune du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="insee_canton">Code INSEE canton</label>
                        <input type="text" class="form-control" id="insee_canton"
                               placeholder="Entrez le code INSEE de du canton du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="region">Région</label>
                        <input type="text" class="form-control" id="region" placeholder="Entrez la région du contact"
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" id="pays" placeholder="Entrez le pays du contact"
                               value="">
                    </div>

                </fieldset>
                <input type="submit" class="btn btn-primary" value="Organisme de formation responsable >">

            </form>
        </div>
    </div>
</div>