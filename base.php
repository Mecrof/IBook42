<?php

function showHeader()
{
	echo '<header id="header">
				
				<h1 id="title"> 
					<a href="./accueil.php">
						iBook<span id="alpha">42</span>
					</a>
				</h1>
				
				<form id="search"  method="post" action="./search.php">
					<label for="input-search">
						<h2>
							RECHERCHER
						</h2>
						<span id="s-1">
							un
						</span>
						<span>
							scan
						</span>
					</label>
					
					<input type="text" id="input-search" name="search" value="" />
					
					<div id="desc-search" class="fade-in">
						Renseignez un nom ou une date
					</div>
				</form>
				
			</header>';
}

function showHeaderVisio($title, $idVol)
{
	echo '<header id="header">
				
				<h1 id="title"> 
					<a href="./accueil.php">
						iBook<span id="alpha">42</span>
					</a>
				</h1>
	
				<h2 id="title-scan" >
					'.$title.' - T'.$idVol.'
				</h2>
					
				<form id="search"  method="post" action="./search.php">
					<label for="input-search">
						<h2>
							RECHERCHER
						</h2>
						<span id="s-1">
							un
						</span>
						<span>
							scan
						</span>
					</label>
					
					<input type="text" id="input-search" name="search" value="" />
					
					<div id="desc-search" class="fade-in">
						Renseignez un nom ou une date
					</div>
				</form>
				
			</header>';
}


function showHeaderVisio2($page, $title, $idVol, $idSerie, $volNum, $nbPage)
{
	echo '<header id="header">
				
				<h1 id="title"> 
					<a href="./accueil.php">
						iBook<span id="alpha">42</span>
					</a>
				</h1>
	
				<h2 id="title-scan" >
					'.$title.' - T'.$idVol.'
				</h2>
				
				<span id="page">
					P. '.$page.'/'.$nbPage.'
				</span>
				
				<form id="search"  method="post" action="./search.php">
					<label for="input-search">
						<h2>
							RECHERCHER
						</h2>
						<span id="s-1">
							un
						</span>
						<span>
							scan
						</span>
					</label>
					
					<input type="text" id="input-search" name="search" value="" />
					
					<div id="desc-search" class="fade-in">
						Renseignez un nom ou une date
					</div>
				</form>
				
				<ul>';
				
				
				if ($page>1)
				{
					echo '
						<li>
							<a class="fade-in-bg" href="./visio.php?s='.$idSerie.'&v='.$volNum.'&p='.($page-1).'">
								Précédent
							</a>
						</li>
					';
				}
				if ($page<$nbPage)
				{
					echo'
						<li>
							<a class="fade-in-bg" href="./visio.php?s='.$idSerie.'&v='.$volNum.'&p='.($page+1).'">
								Suivant
							</a>
						</li>
					';
				}
				echo '
				<li>
					<a class="fade-in-bg" href="./accueil_visio.php?s='.$idSerie.'&v='.$idVol.'">
						Retour
					</a>
				</li>
				</ul>
			</header>';
}

function showFooter()
{
	echo '<footer id="footer">
			Copyright © 2013 INGELMO Kévin - LEVEUGLE Antoine. Tous droits réservés.
		 </footer>';
}

?>