<html>
<body>

<?php
	include("functionsXML.php");
	if (!($idBD = $_GET['bdID']))
	{
		$bds = getAllBD();
		echo '<ul>';
		foreach($bds as $bd){
			echo '<li><a href="scan.php?bdID='.$bd['id'].'">'.$bd->title.'</a></li>';
		}
		echo '</ul>';
	}
	else {
		if( !($page = $_GET['p'])){
			$bd = getBD($idBD);
			echo '<p>Page précédente | <a href="scan.php?bdID='.$idBD.'&p=2">Page suivante</a></p>';
			echo '<img src="'.getScan($bd, 1).'">';
			echo '<p>Page précédente | <a href="scan.php?bdID='.$idBD.'&p=2">Page suivante</a></p>';
		}
		else
		{
			if ($page > 1)
			{
				$bd = getBD($idBD);
				echo '<p><a href="scan.php?bdID='.$idBD.'&p='.($page-1).'">Page précédente</a> | <a href="scan.php?bdID='.$idBD.'&p='.($page+1).'">Page suivante</a></p>';
				echo '<img src="'.getScan($bd, $page).'">';
				echo '<p><a href="scan.php?bdID='.$idBD.'&p='.($page-1).'">Page précédente</a> | <a href="scan.php?bdID='.$idBD.'&p='.($page+1).'">Page suivante</a></p>';
			}
			else
			{
			$bd = getBD($idBD);
				echo '<p>Page précédente | <a href="scan.php?bdID='.$idBD.'&p='.($page+1).'">Page suivante</a></p>';
				echo '<img src="'.getScan($bd, $page).'">';
				echo '<p>Page précédente | <a href="scan.php?bdID='.$idBD.'&p='.($page+1).'">Page suivante</a></p>';
			}
		}
	}
?>

</body>
</html>