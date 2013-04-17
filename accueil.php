<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr_FR" lang="fr_FR">
	<head>
		<meta content="text/html; charset=iso-8859-1" http-equiv="content-type"/>
		<title>
			IBook42 - Référence du scan en ligne
		</title>
		
		<meta name="description" content="iBook42 - La référence du scan en ligne. Retrouvez les meilleurs scans complets."/>
		<meta name="keywords" content="Scan, manga scan, bd scan"/>

		<link type="text/css" href="./styles/effect.css" rel="stylesheet"/>
		<link type="text/css" href="./styles/base.css" rel="stylesheet"/>
		<link type="text/css" href="./styles/accueil.css" rel="stylesheet"/>
	</head>
	
	<body>
		<?php include("functionsXML.php"); ?>
		
		<div id="body">
			<!-- Header contenant le titre et la recherche -->
			<header id="header">
				
				<!-- Titre -->
				<h1 id="title"> 
					iBook42 
				</h1>
				<!-- Fin titre -->
				
				<!-- Recherche -->
				<!-- Fin recherche -->
				
			</header>
			<!-- Fin header -->
			
			<!-- Body -->
			<div id="main-container">
				<!-- Div avec slider -->
				<div id="left">
				<?php
					$series = getAllBD();
					foreach ($series as $bd)
					{
						echo '<div class="block">
								<h1 class="title-scan">'
									.$bd->title.
								'</h1>
								<img src="'.$bd->illustrationPath.'"/>
							</div>';
					}
				
				
				?>
					
				</div>
				
				<div id="right">
						<?php
					$series = getAllBD();
					foreach ($series as $bd){
						echo '<div class="block">	
								<!--<img class="cover" src="'.$bd->illustrationPath.'"/>-->
								<ul class="infos">
									<li class="title-scan">
										<span class="info">Titre :</span>
										'.$bd->title.'
									</li>
									<li class="type">
										<span class="info">Titre :</span>
										'.$bd['type'].'
									</li>
									<li class="author">
										<span class="info">Auteur :</span>
										'.$bd->author.'
									</li>
									<li class="year">
										<span class="info">Année :</span>
										'.$bd->year.'
									</li>
									<li class="language">
										<span class="info">Langue :</span>
										'.$bd['language'].'
									</li>
									<li class="description">
										<span class="info">description :</span>
										'.$bd->description.'
									</li>
								<ul>';
								
						$vols = getAllVolumeOfBD($bd);
						foreach($vols as $vol)
						{
							echo'<li>
									<a href="./accueil_visio.php?s='.$bd['id'].'&v='.$vol->num.'">
										Vol. '.$vol->num.'
									</a>
								</li>';
						}

						echo '</div>';
					}
				
				
				?>
				</div>
			</div>
			<!-- Fin body secondaire -->
			
			<!-- Footer fixe -->
			<footer id="footer">
				iBook42 - All rights reserved - 2013
			</footer>
			<!-- Fin footer -->
		</div>
		
	</body>
	
</html>