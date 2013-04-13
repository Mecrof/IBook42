<html>
<body>
	<?php
		include("./functionsXML.php");
		if(isset($_POST['addSerie']))
		{
			addSerie(	$_POST['title'],
						$_POST['author'], 
						$_POST['illustrationPath'], 
						$_POST['description'], 
						$_POST['year'], 
						$_POST['type'], 
						$_POST['language']
					);
			echo '<h3>Serie added !</h3>';
		}else 
		if(isset($_POST['addVolume']))
		{
			addVolumeToSerie($_POST['series'], 
								$_POST['volume'], 
								$_POST['scanPath']
							);
			echo '<h3>Volume added !</h3>';
		}
	?>
	<form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
	<fieldset><legend><h2>Add a new serie</h2></legend>
		<div>
			<label for="title">Title of the Serie :</label>
				<input id="title" name="title" type="text" value="">
		</div>
		<div>
			<label for="illustrationPath">Path of the comic's illustration :</label>
				<input id="illustrationPath" name="illustrationPath" type="text" value="./illustrations/">
		</div>
		<div>
			<label for="author">Author of the comic :</label>
				<input id="author" name="author" type="text" value="">
		</div>
		<div>
			<label for="year">Parution year of the comic :</label>
				<input id="year" name="year" type="text" value="">
		</div>
		<div>
			<label for="type">Type of the comic :</label>
				<select id="type" name="type" size="1">
					<option>Comics</option>
					<option>Manga</option>
					<option>Book</option>
				</select>
		</div>
		<div>
			<label for="language">Language of the comic :</label>
				<select id="language" name="language" size="1">
					<option>English</option>
					<option>French</option>
				</select>
		</div>
		<div>
			<label for="description">Description of the comic :</label>
				<textarea id="description" name="description" rows=10 cols=40></textarea>
		</div>
		<!--<fieldset>
			<legend><h4>Scans</h4></legend>
			<div>
				<label for="scanPath">Path of scans :</label>
					<input name="scanPath" type="text" value="">
			</div>
		</fieldset>-->
		<div>
			<input type="submit" name="addSerie" value="Ajouter">
		</div>
	</fieldset>
		</form>
		<form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
	<fieldset><legend><h2>Add a new volume in serie</h2></legend>
		<?php
			$series = getAllBD();
			echo '<div>
					<label for="series">The serie :</label>
						<select id="series" name="series" size="1">';
				foreach ($series as $serie){
					echo '<option>'.$serie->title.'</option>';
				}
			echo '		</select>
				</div>';
		?>
		<div>
			<label for="volume">Volume num :</label>
				<input id="volume" name="volume" type="number" step="1" value="0" min="0">
		</div>
		<div>
			<label for="scanPath">Scan path :</label>
				<input id="scanPath" name="scanPath" type="text" value="./scans/">
		</div>
		<div>
			<input type="submit" name="addVolume" value="Ajouter">
		</div>
	</fieldset>
	</form>

</body>
</html>