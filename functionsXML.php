<?php
	function add($title, $author, $illustrationPath, $description, $year, $type, $language, $scanPath)
	{
		if ( ($id=getLastID())==-1)
		{
			echo "erreur id...</br>";
		}
		else
		{
			$file = simplexml_load_file('./bds.xml');
			$new_bd = $file->addChild('bd');
			$new_bd->addAttribute('id', ++$id);
			addLastID($id);
			$new_bd->addAttribute('type', $type);
			$new_bd->addAttribute('language', $language);
			$new_bd->addChild('title', $title);
			$new_bd->addChild('author', $author);
			$new_bd->addChild('illustrationPath', $illustrationPath);
			$new_bd->addChild('description', $description);
			$new_bd->addChild('year', $year);
			$new_bd->addChild('scanPath', $scanPath);
			
			$file->asXml('./bds.xml');
		}
	}
	
	function addLastID($newId)
	{
		if(!$fp = fopen("./idBD.txt", "w"))
		{
			return -1;
		}
		else
		{
			fputs($fp, $newId);
			fclose($fp);
			return 0;
		}
	}
	
	function getLastID()
	{
		if(!$fp = fopen("./idBD.txt", "r"))
		{
			return -1;
		}
		else
		{
			feof($fp);
				if( ($id = intval(fgets($fp, 255)))==1)
					$id = -1;
			fclose($fp);
			return $id;
		}
		
	}
	
	function getAllBD()
	{
		$resTab = array();
		$file = simplexml_load_file('./bds.xml');
		foreach ($file->bd as $bd) 
		{
			$resTab[] = $bd;
		}
		return $resTab;
	}
	
	function getBD($id)
	{
		$file = simplexml_load_file('./bds.xml');
		foreach ($file->bd as $bd)
		{
			if ($bd['id']==$id)
				return $bd;
		}
		return -1;
	}
	
	function searchAll($string)
	{
		$resTab = array();
		$file = simplexml_load_file('./bds.xml');
		$found = false;
		foreach ($file->bd as $bd)
		{
			if (stristr($bd->title, $string) || 
				stristr($bd->author, $string) || 
				stristr($bd->description, $string) || 
				stristr($bd->year, $string))
			{
				$resTab[] = $bd;
				$found = true;
			}
		}
		if ($found)
			return $resTab;
		return -1;
	}
	
	function displayBD($bd)
	{
		echo '<fieldset>';
			echo '<legend><h3>'.$bd->title.'</h3></legend>';
				echo '<p><img src="'.$bd->illustrationPath.'" alt="illustration'.$bd->title.'"/></p>';
				echo '<p>Author : '.$bd->author.'</p>';
				echo '<p>Description : '.$bd->description.'</p>';
				echo '<p>Parution : '.$bd->year.'</p>';
				echo '<p>Scans :</p>';
				echo '<ul>';
		$dirname = $bd->scanPath;
		$dir = opendir($dirname); 
		while($file = readdir($dir)) {
			if($file != '.' && $file != '..' && !is_dir($dirname.$file))
			{
				echo '<li><a href="'.$dirname.$file.'">'.$file.'</a></li>';
			}
		}
		closedir($dir);
		echo '</ul>';
		echo '</fieldset>';
	}
	
	function countScans($bd)
	{
		$dirname = $bd->scanPath;
		$dir = opendir($dirname); 
		$cpt = 0;
		while($file = readdir($dir)) {
			if($file != '.' && $file != '..' && !is_dir($dirname.$file))
			{
				$cpt++;
			}
		}
		closedir($dir);
		return $cpt;
	}
	
	function getScan($bd, $index)
	{
		$cpt = countScans($bd);
		if ( $index > $cpt ){
			return 'index non valide</br>';
		}
		$dirname = $bd->scanPath;
		$dir = opendir($dirname); 
		$cpt = 0;
		while(($file = readdir($dir))&&($cpt!=$index)) {
			if($file != '.' && $file != '..' && !is_dir($dirname.$file))
			{
				$cpt++;
				if ($cpt==$index) {
					return $dirname.$file;
				}
			}
		}
		closedir($dir);
	}
	
	
	
?>