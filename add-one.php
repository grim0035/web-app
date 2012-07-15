<?php

$errors = array();

$fabric_name = filter_input(INPUT_POST, 'fabric_name', FILTER_SANITIZE_STRING);
$fibre_other = filter_input(INPUT_POST, 'fibre_other', FILTER_SANITIZE_STRING);
$pattern = filter_input(INPUT_POST, 'pattern', FILTER_SANITIZE_STRING);
$width_other = filter_input(INPUT_POST, 'width_other', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_FLAG_ALLOW_FRACTION allows decimals
$cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_FLAG_ALLOW_FRACTION allows decimals
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
$notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);
$date_purchased = filter_input(INPUT_POST, 'date_purchased', FILTER_SANITIZE_NUMBER_INT);

//var_dump($quantity);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($fabric_name) < 1  || strlen($fabric_name) > 255) {
		$errors['fabric_name'] = true;	
	}
	
	if (strlen($pattern) < 1  || strlen($pattern) > 55) {
		$errors['pattern'] = true;	
	}
	
	if (strlen($quantity) < 1  || strlen($quantity) > 5) { // check for numbers only and or 2 decimals only? 
		$errors['quantity'] = true;	
	}
	
	if (empty($errors)) {
	// add to DB 
		require_once 'includes/db.php';
		$sql = $db->prepare('
		INSERT INTO incontrol (fabric_name, fibre_other, pattern, width_other, quantity, cost, location, date_purchased, notes)
		VALUES (:fabric_name, :fibre_other, :pattern, :width_other, :quantity, :cost, :location, :date_purchased :notes)
		'); 
		$sql->bindValue(':fabric_name', $fabric_name, PDO::PARAM_STR);
		$sql->bindValue(':fibre_other', $fibre_other, PDO::PARAM_STR);
		$sql->bindValue(':pattern', $pattern, PDO::PARAM_STR);
		$sql->bindValue(':width_other', $width_other, PDO::PARAM_STR);
		$sql->bindValue(':quantity', $quantity, PDO::PARAM_INT);
		$sql->bindValue(':cost', $cost, PDO::PARAM_INT);
		$sql->bindValue(':location', $location, PDO::PARAM_STR);
		$sql->bindValue(':notes', $notes, PDO::PARAM_STR);
		$sql->bindValue(':date_purchased', $date_purchased, PDO::PARAM_INT);
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
		
		<label for="fabric_name">Fabric Name<?php if (isset($errors['fabric_name'])) : ?> <strong class="error"> is required</strong><?php endif; ?></label>
		<input name="fabric_name" id="fabric_name" required value="<?php echo $fabric_name; ?>"></input>
		
		<label for="fibre_content">Fibre Content</label>
		<select id="fibre_content" name="fibre_content" >
			<option value="Cotton">Cotton</option>
			<option value="Polyester">Polyester</option>
			<option value="Rayon">Rayon</option>
			<option value="Silk">Silk</option>
			<option value="Wool">Wool</option>
			<option value="Wool_Blend">Wool Blend</option>
			<option value="Other">Other</option>
		</select>	
			
		<label for="fibre_other">Other </label>
		<input name="fibre_other" id="fibre_other" value="<?php echo $fibre_other; ?>"></input>

		<label for="pattern">Color/Pattern<?php if (isset($errors['pattern'])) : ?> <strong class="error"> is required</strong><?php endif; ?></label>
		<input name="pattern" id="pattern" required value="<?php echo $pattern; ?>"></input>

		<label for="width">Width</label>
		<select id="width" name="width">
			<option value="54_inches">54 inches</option>
			<option value="36_inches">36 inches</option>
			<option value="other">Other</option>
		</select>		
		
		<label for="width_other">Other</label>
		<input name="width_other" id="width_other" value="<?php echo $width_other; ?>"></input>
		
		<label for="quantity">Quantity<?php if (isset($errors['quantity'])) : ?> <strong class="error"> must be a number.</strong><?php endif; ?></label>
		<input name="quantity" id="quantity" required value="<?php echo $quantity; ?>"></input>
		
		<select id="q_units" name="q_units">
			<option value="metres">metres</option>
			<option value="yards">yards</option>
		</select>
		
		<label for="cost">Cost ($CDN)</label>
		<input name="cost" id="cost" value="<?php echo $cost; ?>"></input>
		
		<select id="c_units" name="c_units">
		<option value="per_metre">per metre</option>
		<option value="per_yard">per yard</option>
		</select>
		
		<label for="location">Location Purchased</label>
		<input name="location" id="location" value="<?php echo $location; ?>"></input>
		
		<label for="date_purchased">Date Purchased</label>
		<input name="date_purchased" id="date_purchased" value="<?php echo $date_purchased; ?>"></input>
		
		<label for="notes">Notes</label>
		<textarea name="notes" rows="5" cols="40" value="<?php echo $notes; ?>"></textarea>		
		<button type="submit">Save</button>

	</form>
	
</body>
</html>