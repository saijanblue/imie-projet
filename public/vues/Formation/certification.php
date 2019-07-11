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
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/domaine/<?php echo($arg['formation']->getId()) ?>">Domaine
                                        de
                                        la formation</a>
                            </li>
                            <li>
                                <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/certification/<?php echo($arg['formation']->getId()) ?>"><b>Certifications</b></a>
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
                    <label for="RNCP">RNCP</label>
                    <input type="text" class="form-control" id="RNCP" placeholder="Entrez un code RNCP"
                           value="">
                </div>
                <div class="form-group">
                    <label for="certifInfo">CERTIFINFO</label>
                    <input type="text" class="form-control" id="certifInfo" placeholder="Entrez un code CERTIFINFO"
                           value="">
                </div>
                <button value="Ajouter" class="btn">Ajouter</button>
                <input type="submit" class="btn btn-primary" value="Contact de la formation > ">

            </form>
        </div>
    </div>
</div>