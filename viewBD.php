<html>
<body>
	<?php
		include("./functionsXML.php");
		$tab = getAllBD();
		foreach ($tab as $bd)
		{
			echo getScan($bd, 1);
			displayBD($bd);
		}
		// test de la fonction de recherche
		/*if ( ($res = searchAll('Teacher'))==-1 )
		{
			echo 'error search(string)...';
		}
		else
		{
			foreach ($res as $bd)
			{
				displayBD($bd);
			}
		}*/
		
	?>
</body>
</html>