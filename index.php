<!-- -->
<html>
	<head>
		<script type="text/javascript" src="./javascript.js"></script>
		<link href="style.css" type="text/css" rel="stylesheet" media="all"/>
	</head>
	
	<body>
	<?php include("functionsXML.php"); ?>
		<div id="center">
			<!-- Header contenant le titre et la recherche -->
			<div id="header">
				
				<!-- Titre -->
				<div id="title"> 
					iBook42 
				</div>
				<!-- Fin titre -->
				
				<!-- Recherche -->
				<div id="search">
					Recherche&nbsp;
					<input id="search-bar" type="text"/>
				</div>
				<!-- Fin recherche -->
				
			</div>
			<!-- Fin header -->
			
			<!-- Body -->
			<div id="body">
				<!-- Div avec slider -->
				<div id="move">
				<?php
					$series = getAllBD();
					foreach ($series as $bd){
						echo '<div class="block">
									<div class="infos">
										<div class="title-scan">';
						echo 				$bd->title;
						echo '			</div>
									</div>';
						echo '     	<img src="'.$bd->illustrationPath.'"/>';
						echo '		<div class="zoom">
										<div class="zoom-infos">	
											<img class="close" src="./close.png"/>';
						echo '				<img class="cover" src="'.$bd->illustrationPath.'"/>';
						echo '				<div class="infos">
												<div class="title-scan">
													'.$bd->title.'
												</div>
												<div class="type">
													'.$bd['type'].'
												</div>
												<div class="author">
													'.$bd->author.'
												</div>
												<div class="year">
													'.$bd->year.'
												</div>
												<div class="language">
													'.$bd['language'].'
												</div>
												<div class="description">
													'.$bd->description.'
												</div>
												<ul>';
						$vols = getAllVolumeOfBD($bd);
						foreach($vols as $vol)
						{
							echo '<li><a href="./visio.php?s='.$bd['id'].'&v='.$vol->num.'&p=1">Vol. '.$vol->num.'</a></li>';
						}
						echo'						</ul>
											</div>
										</div>
									</div>
								</div>';
					}
				
				
				?>
					
				</div>
			</div>
			<!-- Fin body secondaire -->
			
			<!-- Footer fixe -->
			<div id="footer">
				iBook42 - All rights reserved - 2013
			</div>
			<!-- Fin footer -->
		</div>
	</body>
</html>