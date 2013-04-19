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
		<link type="text/css" href="./styles/visio.css" rel="stylesheet"/>
	</head>
	
	<body>
		<div id="body">
		<?php
			include("functionsXML.php");
			include("base.php");
			
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

			if (!$notFound)
			{
				showHeaderVisio2($page, $serie->title, $idVol, $serie['id'], $vol->num, $nbPage);
			}
		?>
				

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
			
			<!-- Footer -->
			<?php
				showFooter();
			?>
			<!-- Fin footer -->
		</div>
	</body>
</html>