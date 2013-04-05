<html>
<body>
	<?php
		include("./functionsXML.php");
		if(isset($_POST['ajouter']))
		{
			addSerie($_POST['title'],
				$_POST['author'], 
				$_POST['illustrationPath'], 
				$_POST['description'], 
				$_POST['year'], 
				$_POST['type'], 
				$_POST['language']);
			addVolumeToSerie(9, 1, "the_scan_path");
			echo '<h3>added</h3>';
		}
	?>
	<form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
	<fieldset><legend><h2>Add a new serie</h2></legend>
		<div>
			<label for="title">Title of the Serie :</label>
				<input name="title" type="text" value="">
		</div>
		<div>
			<label for="illustrationPath">Path of the comic's illustration :</label>
				<input name="illustrationPath" type="text" value="">
		</div>
		<div>
			<label for="author">Author of the comic :</label>
				<input name="author" type="text" value="">
		</div>
		<div>
			<label for="year">Parution year of the comic :</label>
				<input name="year" type="text" value="">
		</div>
		<div>
			<label for="type">Type of the comic :</label>
				<select name="type" size="1">
					<option>Comics</option>
					<option>Manga</option>
					<option>Book</option>
				</select>
		</div>
		<div>
			<label for="language">Language of the comic :</label>
				<select name="language" size="1">
					<option>English</option>
					<option>French</option>
				</select>
		</div>
		<div>
			<label for="description">Description of the comic :</label>
				<textarea name="description" rows=10 cols=40></textarea>
		</div>
		<!--<fieldset>
			<legend><h4>Scans</h4></legend>
			<div>
				<label for="scanPath">Path of scans :</label>
					<input name="scanPath" type="text" value="">
			</div>
		</fieldset>-->
		<div>
			<input type="submit" name="ajouter" value="Ajouter">
		</div>
	</fieldset>
	<fieldset><legend><h2>Add a new volume in serie</h2></legend>
		<?php
			$series = getAllBD();
			//foreach ($series = ///AFINIR !!
		?>
	</fieldset>
	</form>
</body>
</html>