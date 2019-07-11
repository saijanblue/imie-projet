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
                                    <a href="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>formation/edit/modularisation/<?php echo($arg['formation']->getId()) ?>"><strong>Modularisation</strong></a>
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


            </form>
        </div>
    </div>
</div>