<?php

$errors = array();

$fabric_name = filter_input(INPUT_POST, 'fabric_name', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($fabric_name) < 1  || strlen($fabric_name) > 255) {
		$errors['fabric_name'] = true;	
	}
	
	
	if (empty($errors)) {
	// do DB stuff
		require_once 'includes/db.php';
		$sql = $db->prepare('
		INSERT INTO incontrol (fabric_name)
		VALUES (:fabric_name)
		'); 
		$sql->bindValue(':fabric_name', $fabric_name, PDO::PARAM_STR);
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
	<form method="post" action="add-one.php">
		<label for="fabric_name">Fabric Name<?php if (isset($errors['fabric_name'])) : ?> <strong class="error">is required</strong><?php endif; ?></label>
		<input name="fabric_name" id="fabric_name" required value="<?php echo $fabric_name; ?>"></input>
		<label for="fibre_content">Fibre Content</label>
		<select id="fibre-content" name="fibre_content">
			<option value="Cotton">Cotton</option>
			<option value="Polyester">Polyester</option>
			<option value="Rayon">Rayon</option>
			<option value="Silk">Silk</option>
			<option value="Wool">Wool</option>
			<option value="Wool_Blend">Wool Blend</option>
			<option value="Other">Other</option>

		</select>	
			
		<label for="fibre_other">Other </label>
		<input name="fibre_other" id="fibre_other"></input>

		<label for="pattern">Color/Pattern</label>
		<input name="pattern" id="pattern"></input>

		<label for="width">Width</label>
		<select id="width" name="width">
			<option value="54_inches">54 inches</option>
			<option value="36_inches">36 inches</option>
		</select>		
		
		<label for="width_other">Other</label>
		<input name="width_other" id="width_other"></input>
		
		<label for="quantity">Quantity</label>
		<input name="quantity" id="quantity"></input>
		
		<select id="q_units" name="q_units">
			<option value="metres">metres</option>
			<option value="yards">yards</option>
		</select>
		
		<label for="cost">Cost ($CDN)</label>
		<input name="cost" id="cost"></input>
		
		<select id="c_units" name="c_units">
		<option value="per_metre">per metre</option>
		<option value="per_yard">per yard</option>
		</select>
		
		<label for="location">Location Purchased</label>
		<input name="location" id="location"></input>
		
		<label for="date_purchased">Date Purchased</label>
		<input name="date_purchased" id="date_purchased" value="YYYY-MM-DD"></input>
		
		<label for="notes">Notes</label>
		<textarea name="notes" rows="5" cols="40"></textarea>		
		<button type="submit">Save</button>

	</form>
	
</body>
</html>