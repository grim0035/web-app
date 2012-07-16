<?php
require_once 'includes/db.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$fabric_name = filter_input(INPUT_POST, 'fabric_name', FILTER_SANITIZE_STRING);
$fibre_other = filter_input(INPUT_POST, 'fibre_other', FILTER_SANITIZE_STRING);
$pattern = filter_input(INPUT_POST, 'pattern', FILTER_SANITIZE_STRING);
$width_other = filter_input(INPUT_POST, 'width_other', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_FLAG_ALLOW_FRACTION allows decimals
$cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
$date_purchased = filter_input(INPUT_POST, 'date_purchased', FILTER_SANITIZE_NUMBER_INT);
$notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (strlen($pattern) < 1  || strlen($pattern) > 255) {
		$errors['pattern'] = true;	
	}
	

	if (empty($errors)) {
	// add to DB 
		require_once 'includes/db.php';
		$sql = $db->prepare('
		
		UPDATE incontrol 
		SET pattern = :pattern
		WHERE id = :id 

		'); 
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':pattern', $pattern, PDO::PARAM_STR);

		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
} else {
$sql = $db->prepare('
	SELECT fabric_name, fibre_other, pattern, width_other, quantity, cost, location, date_purchased, notes
	FROM incontrol
	WHERE id = :id
');
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		$results = $sql->fetch();
		
		$fabric_name = $results['fabric_name'];
		$pattern = $results['pattern'];
		$width_other = $results['width_other'];
		$quantity = $results['quantity'];
		$cost = $results['cost'];
		$location = $results['location'];
		$date_purchased = $results['date_purchased'];
		$notes = $results['notes'];


}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit <?php echo $results['pattern'];?> &middot; InControl</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<body>
	<h1>Edit <?php echo $results['pattern'];?></h1>
	<p><a href="index.php">Cancel</a></p>
	<form method="post" action="edit.php?id=<?php echo $id; ?>">
		
		<label for="fabric_name">Fabric Name</label>
		<input name="fabric_name" id="fabric_name" required value="<?php echo $fabric_name; ?>"></input>
		
		<label for="fibre_content">Fibre Content</label>
		<select id="fibre_content" name="fibre_content" >
			<option value="fix this">choose</option>
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
		
		<label for="quantity">Quantity</label>
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