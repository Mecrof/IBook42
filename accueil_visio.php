<!-- -->
<html>
	<head>
		<script type="text/javascript" src="./javascript_accueil_visio.js"></script>
		<link href="style_accueil_visio.css" type="text/css" rel="stylesheet" media="all"/>
	</head>
	
	<body>
		<div id="center">
			<?php
			include("functionsXML.php");
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
			
			<div id="banner">
			<!-- Menu principal -->
				<ul id="menu">
					<li>
						<a id="button-home" href="./">
							Accueil
						</a>
					</li>
				</ul>
				<?php
				if (!$notFound)
				{
					echo '
					<h1 id="title">
						'.$serie->title.' - T'.$idVol.'
					</h1>
					';
				}
				?>
			</div>
			<!-- Fin menu -->
			
			<div id="body">
			
			<?php
				if ($notFound)
				{
					echo '
					<div id="body">
							<img id="scan" src="./Error404.jpg"/>
					</div>
					';
				}
				else
				{
					for ($i=1; $i<=$nbPage; ++$i)
					{
						echo '
						<div class="block">
							<a href="./visio.php?s='.$idSerie.'&v='.$idVol.'&p='.$i.'">
								<img src="'.getScan($vol,$i).'" />
								<div class="page">'.$i.'</div>
							</a>
						</div>
						';
					}
				}
			?>
			</div>
			
			<!-- Footer fixe -->
			<div id="footer">
				iBook42 - All rights reserved - 2013
			</div>
			<!-- Fin footer -->
			
		</div>
	</body>
</html>