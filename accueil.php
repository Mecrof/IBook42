<!DOCTYPE html>
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
		
		<script type="text/javascript"  src="./js/accueil.js"></script>
	</head>
	
	<body>
		<?php 
			include("functionsXML.php"); 
			include("base.php");
		?>
		
		<div id="body">
		
			<?php
				showHeader();
			?>
			
			<!-- Body -->
			<div id="main-container">
				<!-- Div avec slider -->
				<div id="left">
					<?php
						$series = getAllBD();
						foreach ($series as $bd)
						{
							echo '<div class="block fade-in-bg">
									<span class="hover"></span>
									<h1 class="title-scan">'
										.$bd->title.
									'</h1>
									<img src="'.$bd->illustrationPath.'"/>

									<div class="block-infos">	
										<ul class="infos">
											<li class="title-scan">
												<span class="info">Titre <span class="black">.............</span></span>
												'.$bd->title.'
											</li>
											<li class="type">
												<span class="info">Type <span class="black">.............</span></span>
												'.$bd['type'].'
											</li>
											<li class="author">
												<span class="info">Auteur <span class="black">..........</span></span>
												'.$bd->author.'
											</li>
											<li class="year">
												<span class="info">Année <span class="black">...........</span></span>
												'.$bd->year.'
											</li>
											<li class="language">
												<span class="info">Langue <span class="black">.........</span></span>
												'.($bd['language'] == "French" ? "Français":"Anglais").'
											</li>
											<li class="description">
												<span class="info last-info">Description <span class="black">:</span></span>
												<p>'.$bd->description.'</p>
											</li>
										</ul>
										
										<ul class="links">';
									
							$vols = getAllVolumeOfBD($bd);
							foreach($vols as $vol)
							{
								echo'<li>
											<a class="fade-in-bg" href="./accueil_visio.php?s='.$bd['id'].'&v='.$vol->num.'">
												Vol. '.$vol->num.'
											</a>
										</li>';
							}

							echo '	</ul>
								</div>
								</div>';
						}
					?>				
				</div>

			</div>
			<!-- Fin body secondaire -->
			
			<!-- Footer -->
			<?php
				showFooter();
			?>
			<!-- Fin footer -->
		</div>
		
	</body>
	
</html>