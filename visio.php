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
		<link type="text/css" href="./styles/visio.css" rel="stylesheet"/>
	</head>
	
	<body>
		<div id="body">
		<?php
			include("functionsXML.php");
			if (empty($_GET) || count($_GET)!=3)
			{
				$notFound = true;
			}
			else if (!isset($_GET['s']) || !isset($_GET['v']) || !isset($_GET['p']))
			{
				$notFound = true;
			}
			else
			{
				$idSerie = $_GET['s'];
				$idVol = $_GET['v'];
				$page = $_GET['p'];
				
				$serie = getBD($idSerie);
				$vol = getVolume($serie, $idVol);
				$nbPage = countScans($vol);
				$notFound = false;
			}
		?>
			
			<header id="header">
				<?php
				if (!$notFound)
				{
					echo '
						<h1 id="title">
							'.$serie->title.'	
						</h1>
						<h2>
							'.$page.'/'.$nbPage.'
						</h2>
					';
				?>
					<ul id="menu">
						<li>
							<a id="button-home" href="./accueil.php">
								Accueil
							</a>
						</li>
				<?php
					if ($page>1)
					{
						echo '
							<li>
								<a class="button" href="./visio.php?s='.$serie['id'].'&v='.$vol->num.'&p='.($page-1).'">
									Précédent
								</a>
							</li>
						';
					}
					if ($page<$nbPage)
					{
						echo'
							<li>
								<a class="button" href="./visio.php?s='.$serie['id'].'&v='.$vol->num.'&p='.($page+1).'">
									Suivant
								</a>
							</li>
						';
					}
						echo '
							<li>
								<a class="button" href="./accueil_visio.php?s='.$idSerie.'&v='.$idVol.'">
									Retour
								</a>
							</li>
						</ul>
					';
				}
				?>
			</header>
			<!-- Fin menu -->
				

			<!-- Fin menu -->
			<?php
				if ($notFound || $page >$nbPage || $page < 1)
				{
					echo '
					<div id="body">
							<img id="scan" src="./Error404.jpg"/>
					</div>
					';
				}
				else
				{
					echo '
					<div id="main-container">
							<img id="scan" src="'.getScan($vol,$page).'"/>
					</div>
					';
				}
			?>
			<!-- Footer fixe -->
			<div id="footer">
				iBook42 - All rights reserved - 2013
			</div>
			<!-- Fin footer -->
		</div>
	</body>
</html>