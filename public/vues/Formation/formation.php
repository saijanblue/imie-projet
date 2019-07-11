<div class="table-wrapper">

    <div>
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6 offset-3"

                <form class="form-row" method="post" enctype="multipart/form-data"
                      action="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/import">
                    <div class="custom-file">

                        <input name="file" type="file" value="table" class="custom-file-input form-control">
                        <label class="custom-file-label" for="custom-file">
                            Choissisez votre fichier à importer
                        </label>
                        <input name="submit" type="submit" value="Importer" class="btn btn-primary col-md-2 offset-10">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> Choix des colonnes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <option class="option-col" value="id" data-column="0">ID</option>
            <option class="option-col" value="domain" data-column="1" style="cursor: pointer;">Domaine</option>
            <option class="option-col" value="objectif" data-column="2" style="cursor: pointer;">Objectif</option>
            <option class="option-col" value="resultats" data-column="3" style="cursor: pointer;">Resultats
                attendus
            </option>
            <option class="option-col" value="contenu" data-column="4" style="cursor: pointer;">Contenu</option>
            <option class="option-col" value="certifiante" data-column="4" style="cursor: pointer;">Certifiante
            </option>
            <option class="option-col" value="contact" data-column="4" style="cursor: pointer;">Contact</option>
            <option class="option-col" value="parcours" data-column="4" style="cursor: pointer;">Parcours</option>
            <option class="option-col" value="code_entree" data-column="4" style="cursor: pointer;">Niveau entree
            </option>
            <option class="option-col" value="code_sortie" data-column="4" style="cursor: pointer;">Niveau sortie
            </option>
            <option class="option-col" value="url" data-column="4" style="cursor: pointer;">Site</option>
            <option class="option-col" value="organisme" data-column="4" style="cursor: pointer;">Organisme
                responsable
            </option>
            <!--            <option class="option-col" value="sous_modules" data-column="4" style="cursor: pointer;">Certification</option>-->
            <!--            <option class="option-col" value="modules" data-column="4" style="cursor: pointer;">Modules prerequis</option>-->
            <option class="option-col" value="eligibilité" data-column="4" style="cursor: pointer;">Eligibilite
                CPF
            </option>
            <option class="option-col" value="validation" data-column="4" style="cursor: pointer;">Validation
            </option>
        </div>
    </div>
    <table class="cell-border stripe display" cellspacing="0" id="table-domain" style="text-align: center">
        <thead>
        <tr>
            <th name="intitulé">Intitulé</th>
            <th name="domain">Domaine</th>
            <th name="objectif">Objectif</th>
            <th name="resultats">Résultats attendus</th>
            <th name="contenu">Contenu</th>
            <th name="certifiante">Certifiante</th>
            <th name="contact">Contact</th>
            <th name="parcours">Parcours</th>
            <th name="code_entree">Niveau entree</th>
            <th name="code_sortie">Niveau sortie</th>
            <!--                <th name="url">Site</th>-->
            <!--                <th name="organisme">Organisme responsable</th>-->
            <!--                <th name="eligibilité">Eligibilité CPF</th>-->
            <!--                <th name="validation">Validation</th>-->
            <th name="detail">Actions</th>
        </tr>
        </thead>
        <tbody>
        <!--            --><?php
        //            $formation = new Formation();
        //            $formations = $formation->getAllFormations();
        //            foreach ($formations as $formation) {
        //                $str = "<tr>";
        //                $str .= "<td>" . $formation['domaine_formation'] . "</td>";
        //                $str .= "<td>" . $formation['objectif_formation'] . "</td>";
        //                $str .= "<td>" . $formation['resultats_attendus'] . "</td>";
        //                $str .= "<td>" . $formation['contenu_formation'] . "</td>";
        //                $str .= "<td>" . $formation['certifiante'] . "</td>";
        //                $str .= "<td>" . $formation['contact_formation'] . "</td>";
        //                $str .= "<td>" . $formation['parcours_formation'] . "</td>";
        //                $str .= "<td>" . $formation['code_niveau_entree'] . "</td>";
        //                $str .= "<td>" . $formation['code_niveau_sortie'] . "</td>";
        //                $str .= "<td>" . $formation['url_formation'] . "</td>";
        //                $str .= "<td>" . $formation['organisme_formation_responsable'] . "</td>";
        //                $str .= "<td>" . $formation['eligibilite_cpf'] . "</td>";
        //                $str .= "<td>" . $formation['validation'] . "</td>";
        //                $str .= "<td><a href=\"\" class=\"btn btn-primary\">Voir details</a></td>";
        //                $str .= "</tr>";
        //
        //                print_r($str);
        //            } ?>

        </tbody>
    </table>
</div>
</div>