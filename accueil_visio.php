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
		<link type="text/css" href="./styles/accueil_visio.css" rel="stylesheet"/>
	</head>
	
	<body>
		<div id="body">
		
			<?php
			include("functionsXML.php");
			include("base.php");
			
			if (empty($_GET) || count($_GET)!=2)
			{
				$notFound = true;
			}
			else if (!isset($_GET['s']) || !isset($_GET['v']))
			{
				$notFound = true;
			}
			else
			{
				$idSerie = $_GET['s'];
				$idVol = $_GET['v'];
				
				$serie = getBD($idSerie);
				$vol = getVolume($serie, $idVol);
				$nbPage = countScans($vol);
				$notFound = false;
			}
			?>
			
				<?php
				if (!$notFound)
				{
					showHeaderVisio($serie->title, $idVol);
				}
				?>
				
				<!-- 
				<ul id="menu">
					<li>
						<a class="fade-in-bg" href="./accueil.php">
							Accueil
						</a>
					</li>
					
				</ul>-->
			<!-- Fin menu -->

			<div id="main-container">
				<?php
					if ($notFound)
					{
						echo '<img id="scan" src="./Error404.jpg"/>';
					}
					else
					{
						for ($i=1; $i<=$nbPage; ++$i)
						{
							echo '
							<div class="block">
								
								<img src="'.getScan($vol,$i).'" />
								
								<a class="page"href="./visio.php?s='.$idSerie.'&v='.$idVol.'&p='.$i.'">
									<span >'.$i.'</span>
								</a>
								
							</div>
							';
						}
					}
				?>
			</div>
			
			<!-- Footer -->
			<?php
				showFooter();
			?>
			<!-- Fin footer -->
			
		</div>
	</body>
</html>