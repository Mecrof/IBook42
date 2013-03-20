<html>
<body>
	<?php
		include("./functionsXML.php");
		$tab = getAllBD();
		foreach ($tab as $bd)
		{
			displayBD($bd);
		}
		// test de la fonction de recherche
		if ( ($res = search('Teacher'))==-1 )
		{
			echo 'error search(string)...';
		}
		else
		{
			foreach ($res as $bd)
			{
				displayBD($bd);
			}
		}
		
	?>
</body>
</html>