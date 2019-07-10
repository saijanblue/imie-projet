<div>
    <form style="margin-bottom: 40px" action="formation/update/".<?php echo($arg['formation']->getId())?> method="post" class="form">
        <div class="form-group">
            <label for="int-forma">Intitulé de la formation*</label>
            <input type="text" class="form-control" id="int-forma" value="<?php echo($arg['formation']->getContenuFormation());  ?>">
        </div>
        <div class="form-group">
            <label for="obj-forma">Objectif de la formation*</label>
            <input type="text" class="form-control" id="obj-forma" value="<?php echo($arg['formation']->getObjectifFormation());  ?>">
        </div>
        <div class="form-group">
            <label for="res-forma">Résultats attendus*</label>
            <input type="text" class="form-control" id="res-forma" value="<?php echo($arg['formation']->getResultatsAttendus());  ?>">
        </div>
        <div class="form-group">
            <label for="cont-forma">Contenu de la formation*</label>
            <input type="text" class="form-control" id="cont-forma" value="<?php echo($arg['formation']->getContenuFormation());  ?>">
        </div>
        <div class="form-group">
            <label for="certif-forma">Formation certifiante*</label>
            <select class="custom-select">
                <?php
                foreach($arg['codification']->getList("bool") as $l){
                    if ($arg['formation']->getCertifiante() == $l["id"]){
                    echo "<option selected>".utf8_encode($l["val"])."</option>";
                    } else {
                    echo "<option>".utf8_encode($l["val"])."</option>";
                    }
                }
                ?>
              </select>
        </div>
        <div class="form-group">
            <label for="type-forma">Type de parcours de formation*</label>
            <select class="custom-select">
                <?php
                foreach($arg['codification']->getList("parcours") as $l){
                    if ($arg['formation']->getParcoursFormation() == $l["id"]){
                        echo "<option selected>".utf8_encode($l["val"])."</option>";
                    } else {
                        echo "<option>".utf8_encode($l["val"])."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="entree-forma">Niveau d'entrée*</label>
            <select class="custom-select">
                <?php
                foreach($arg['codification']->getList("niveaux") as $l){
                    if ($arg['formation']->getCodeNiveauEntree() == $l["id"]){
                        echo "<option selected>".utf8_encode($l["val"])."</option>";
                    } else {
                        echo "<option>".utf8_encode($l["val"])."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="sortie-forma">Niveau de sortie</label>
            <select class="custom-select">
                <?php
                foreach($arg['codification']->getList("niveaux") as $l){
                    if ($arg['formation']->getCodeNiveauSortie() == $l["id"]){
                        echo "<option selected>".utf8_encode($l["val"])."</option>";
                    } else {
                        echo "<option>".utf8_encode($l["val"])."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="url-forma">URL de la formation</label>
            <input type="text" class="form-control" id="url-forma" value="<?php echo($arg['formation']->getContenuFormation());  ?>">
        </div>

        <input type="submit" class="btn btn-primary" value="Domaine de formation">
    </form>
</div>

