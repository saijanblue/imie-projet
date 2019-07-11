<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="row">

                <div id="tree" class="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/offre/<?php echo($arg['formation']->getId()) ?>"><b>Offre
                                    de
                                    formation</b></a>
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
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/contact-formation/<?php echo($arg['formation']->getId()) ?>">Contact
                                        de
                                        la formation</a>
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

            <form style="margin-bottom: 40px"
                  action="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/update/<?php echo($arg['formation']->getId()) ?>"
                  method="post" class="form">
                <div class="form-group">
                    <label for="int-forma">Intitulé de la formation*</label>
                    <input type="text" class="form-control" id="int-forma"
                           placeholder="Entrez un titre pour la formation"
                           value="<?php echo($arg['formation']->getIntituleFormation()); ?>">
                </div>
                <div class="form-group">
                    <label for="obj-forma">Objectif de la formation*</label>
                    <textarea type="text" cols="5" class="form-control" id="obj-forma"
                              placeholder="Entrez un objectif de la formation"
                    ><?php echo($arg['formation']->getObjectifFormation()); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="res-forma">Résultats attendus*</label>
                    <textarea cols="5" type="text" class="form-control" id="res-forma"
                              placeholder="Entrez les résultats attendus de la formation"
                    ><?php echo($arg['formation']->getResultatsAttendus()); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="cont-forma">Contenu de la formation*</label>
                    <textarea cols="5" type="text" class="form-control" id="cont-forma"
                              placeholder="Entrez le contenu de la formation"
                    ><?php echo($arg['formation']->getContenuFormation()); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="certif-forma">Formation certifiante*</label>
                    <select class="custom-select">
                        <option>---</option>
                        <?php
                        foreach ($arg['codification']->getList("bool") as $l) {
                            if ($arg['formation']->getCertifiante() == $l["id"]) {
                                echo "<option selected>" . $l["val"] . "</option>";
                            } else {
                                echo "<option>" . $l["val"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type-forma">Type de parcours de formation*</label>
                    <select class="custom-select">
                        <option>---</option>
                        <?php
                        foreach ($arg['codification']->getList("parcours") as $l) {
                            if ($arg['formation']->getParcoursFormation() == $l["id"]) {
                                echo "<option selected>" . $l["val"] . "</option>";
                            } else {
                                echo "<option>" . $l["val"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="entree-forma">Niveau d'entrée*</label>
                    <select class="custom-select">
                        <option>---</option>
                        <?php
                        foreach ($arg['codification']->getList("niveaux") as $l) {
                            if ($arg['formation']->getCodeNiveauEntree() == $l["id"]) {
                                echo "<option selected>" . $l["val"] . "</option>";
                            } else {
                                echo "<option>" . $l["val"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sortie-forma">Niveau de sortie</label>
                    <select class="custom-select">
                        <option>---</option>
                        <?php
                        foreach ($arg['codification']->getList("niveaux") as $l) {
                            if ($arg['formation']->getCodeNiveauSortie() == $l["id"]) {
                                echo "<option selected>" . $l["val"] . "</option>";
                            } else {
                                echo "<option>" . $l["val"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="url-forma">URL de la formation</label>
                    <input type="text" class="form-control" id="url-forma" placeholder="Entrez l'URL de la formation"
                           value="<?php echo($arg['formation']->getContenuFormation()); ?>">
                </div>

                <input type="submit" class="btn btn-primary" value="Domaine de formation >">
            </form>
        </div>

    </div>
</div>


