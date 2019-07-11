<header>
 		<nav>

 			<ul class="nav-menu" style="z-index: 10">
 				<li><a href=" <?php echo(explode("index.php",$_SERVER['PHP_SELF']))[0] ?>Home">Accueil</a></li>
 				<li><a href="<?php echo(explode("index.php",$_SERVER['PHP_SELF']))[0] ?>formation" style="margin-left: 10px">Catalogue de formation</a></li>
 			</ul>
 			<ul class="nav-connexion" style="z-index: 10">
 				<li><a href="<?php echo(explode("index.php",$_SERVER['PHP_SELF']))[0] ?>Connexion">Connexion</a></li>
 			</ul>
 		</nav>
 		<div class="col-1 offset-5" style="z-index: 10">
 			<div class="logo-wise-wrapper">
 				<img class="logo-wise" src="<?php echo (explode("index.php", $_SERVER['PHP_SELF']))[0] ?>/public/assets/img/WiseLogo.png" >
 			</div>
 		</div>
<!-- 		<div class="overlay" style="position: absolute;"></div>-->
<!-- 		<h1>Portail de la formation en électronique</h1>-->
 	</header>