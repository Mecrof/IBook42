<!-- -->
<html>
	<head>
		<script type="text/javascript" src="./javascript_visio.js"></script>
		<link href="style_visio.css" type="text/css" rel="stylesheet" media="all"/>
	</head>
	
	<body>
		<div id="center">
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
			
			<!-- Menu principal -->
			<ul id="menu">
				<li>
					<a id="button-home" href="./">
						Accueil
					</a>
				</li>
				
		<?php
			if (!$notFound)
			{
				echo '
					<li>
						'.$serie->title.'
					</li>
				';
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
			}
		?>
				<li>
					<a class="button">
						Retour
					</a>
				</li>
			</ul>
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
					<div id="body">
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