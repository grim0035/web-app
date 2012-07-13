<?php

$errors = array();

$movie_title = filter_input(INPUT_POST, 'movie_title', FILTER_SANITIZE_STRING);
$release_date = filter_input(INPUT_POST, 'release_date', FILTER_SANITIZE_NUMBER_INT);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($movie_title) < 1  || strlen($movie_title) > 256) {
		$errors['movie_title'] = true;	
	}
	
	if (strlen($release_date) < 4  || strlen($release_date) > 4) {
		$errors['release_date'] = true;	
	}
	
	if (strlen($director) < 1  || strlen($director) > 256) {
		$errors['director'] = true;	
	}

	
	if (empty($errors)) {
	// do DB stuff
		require_once 'includes/db.php';
		$sql = $db->prepare('
		INSERT INTO movies (movie_title, release_date, director)
		VALUES (:movie_title, :release_date, :director)
		'); 
		$sql->bindValue(':movie_title', $movie_title, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_INT);
		$sql->bindValue(':director', $director, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Inventory &middot; InControl</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<body>
	<form method="post" action="add-inventory.php">
		<label for="fabric-name">Fabric Name</label>
		<input name="fabric-name" id="fabric-name"></input>
		<label for="fibre-content">Fibre Content</label>
		<select id="fibre-content" name="fibre-content">
			<option value="Cotton">Cotton</option>
			<option value="Polyester">Polyester</option>
			<option value="Rayon">Rayon</option>
			<option value="Silk">Silk</option>
			<option value="Wool">Wool</option>
			<option value="Wool-Blend">Wool Blend</option>
			<option value="Other">Other</option>

		</select>	
			
		<label for="fibre-other">Other </label>
		<input name="fibre-other" id="fibre-other"></input>

		<label for="pattern">Color/Pattern</label>
		<input name="pattern" id="pattern"></input>

		<label for="width">Width</label>
		<select id="width" name="width">
			<option value="54-inches">54 inches</option>
			<option value="36-inches">36 inches</option>
		</select>		
		
		<label for="width-other">Other</label>
		<input name="width-other" id="width-other"></input>
		
		<label for="quantity">Quantity</label>
		<input name="quantity" id="quantity"></input>
		
		<select id="q-units" name="q-units">
			<option value="metres">metres</option>
			<option value="yards">yards</option>
		</select>
		
		<label for="cost">Cost ($CDN)</label>
		<input name="cost" id="cost"></input>
		
		<select id="c-units" name="c-units">
		<option value="per-metre">per metre</option>
		<option value="per-yard">per yard</option>
		</select>
		
		<label for="location">Location Purchased</label>
		<input name="location" id="location"></input>
		
		<label for="date-purchased">Date Purchased</label>
		<input name="date-purchased" id="date-purchased" value="YYYY-MM-DD"></input>
		
		<label for="notes">Notes</label>
		<textarea name="notes" rows="5" cols="40"></textarea>		
		<button type="submit">Save</button>

	</form>
	
</body>
</html>