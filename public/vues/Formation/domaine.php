<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="row">

                <div id="tree" class="col-md-11">
                    <ul>
                        <li>
                            <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/offre/<?php echo($arg['formation']->getId()) ?>">Offre
                                de
                                formation</a>
                        </li>
                        <ul>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/domaine/<?php echo($arg['formation']->getId()) ?>"><b>Domaine
                                        de
                                        la formation</b></a>
                            </li>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/certification/<?php echo($arg['formation']->getId()) ?>">Certifications</a>
                            </li>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/contact-formation/<?php echo($arg['formation']->getId()) ?>">Contact
                                    de
                                    la formation</a>
                            </li>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/organisme-formation-responsable/<?php echo($arg['formation']->getId()) ?>">Organisme
                                    de
                                    formation responsable</a>
                            </li>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/actions/<?php echo($arg['formation']->getId()) ?>">Actions
                                    de formation</a>
                            </li>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/modularisation/<?php echo($arg['formation']->getId()) ?>">Modularisation</a>
                            </li>

                        </ul>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7">

            <form style="margin-bottom: 40px" action="formation/update/" .<?php echo($arg['formation']->getId()) ?>
                  method="post" class="form">
                <div class="form-group">
                    <label for="formacode-ref">FORMACODE*</label>
                    <input type="text" class="form-control" id="formacode-ref" placeholder="Catégorie"
                           value="">
                </div>
                <div class="form-group">
                    <label hidden for="formacode-value">FORMACODE*</label>
                    <input type="text" class="form-control" id="formacode-value" placeholder="Entrez un FORMACODE"
                           value="">
                </div>
                <div class="form-group">
                    <label for="rome-code">ROME*</label>
                    <input type="text" class="form-control" id="rome-code" placeholder="Entrez un code ROME"
                           value="">
                </div>
                <div class="form-group">
                    <label for="nsf-code">NSF*</label>
                    <input type="text" class="form-control" id="nsf-ref" placeholder="Entrez un code NSF"
                           value="">
                </div>

                <input type="submit" class="btn btn-primary" value="Certifications >">

            </form>
        </div>
    </div>
</div>