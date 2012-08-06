<?php
require_once 'selected.php';
require_once 'includes/db.php';

$errors = array(); 

 //Writes the photo to the server 
// if(move_uploaded_file($_FILES['preview']['tmp_name'], $target)) 
 //{
 
 //Tells you if its all ok 
 //echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
// }		

$fabric_name = filter_input(INPUT_POST, 'fabric_name', FILTER_SANITIZE_STRING);
$fibre_content = filter_input(INPUT_POST, 'fibre_content', FILTER_SANITIZE_NUMBER_INT);
$fibre_other = filter_input(INPUT_POST, 'fibre_other', FILTER_SANITIZE_STRING);
$pattern = filter_input(INPUT_POST, 'pattern', FILTER_SANITIZE_STRING);
$width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_NUMBER_INT);
$width_other = filter_input(INPUT_POST, 'width_other', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_FLAG_ALLOW_FRACTION allows decimals
$q_units = filter_input(INPUT_POST, 'q_units', FILTER_SANITIZE_NUMBER_INT); 
$cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
$c_units = filter_input(INPUT_POST, 'c_units', FILTER_SANITIZE_NUMBER_INT); 
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
$date_purchased = filter_input(INPUT_POST, 'date_purchased', FILTER_SANITIZE_NUMBER_INT);
$notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($fabric_name) < 1  || strlen($fabric_name) > 255) {
		$errors['fabric_name'] = true;	
	}
	
	if (strlen($pattern) < 1  || strlen($pattern) > 55) {
		$errors['pattern'] = true;	
	}
	
	if (strlen($quantity) < 1  || strlen($quantity) > 8) { // change this to check for numbers only 
		$errors['quantity'] = true;	
	}
	
	if (empty($errors)) {
		// add to DB 
		//	mysql_connect("localhost:8888/grim0035/web-app/", $user, $pass) or die(mysql_error()) ; //not needed since we're connecting with PDO instead
		//This is the directory where images will be saved 
		
		 $target = "images/"; 
		 $target = $target . basename( $_FILES['preview']['name']); 
		 
		 //This gets all the other information from the form 
		 $preview=($_FILES['preview']['name']);  
 
		move_uploaded_file($_FILES['preview']['tmp_name'], $target);
	
		require_once 'includes/db.php';
		$sql = $db->prepare('
		INSERT INTO incontrol (fabric_name, fibre_content, fibre_other, pattern, width, width_other, quantity, q_units, cost, c_units, location, date_purchased, notes, preview)
		VALUES (:fabric_name, :fibre_content, :fibre_other, :pattern, :width, :width_other, :quantity, :q_units, :cost, :c_units, :location, :date_purchased, :notes, :preview)
		'); 
		
		$sql->bindValue(':fabric_name', $fabric_name, PDO::PARAM_STR);
		$sql->bindValue(':fibre_content', $fibre_content, PDO::PARAM_INT);		
		$sql->bindValue(':fibre_other', $fibre_other, PDO::PARAM_STR);
		$sql->bindValue(':pattern', $pattern, PDO::PARAM_STR);
		$sql->bindValue(':width', $width, PDO::PARAM_INT);				
		$sql->bindValue(':width_other', $width_other, PDO::PARAM_STR);
		$sql->bindValue(':quantity', $quantity, PDO::PARAM_INT);
		$sql->bindValue(':q_units', $q_units, PDO::PARAM_INT);		
		$sql->bindValue(':cost', $cost, PDO::PARAM_INT);
		$sql->bindValue(':c_units', $cost, PDO::PARAM_INT);
		$sql->bindValue(':location', $location, PDO::PARAM_STR);
		$sql->bindValue(':date_purchased', $date_purchased, PDO::PARAM_INT);
		$sql->bindValue(':notes', $notes, PDO::PARAM_STR);
		$sql->bindValue(':preview', $preview, PDO::PARAM_STR);
		$sql->execute();
		

		//header('Location: index.php');
		//exit;
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
<div class="wrapper">
	<div class="dashboard">
		<h2>InControl > Inventory</h2>	
	<h1>Add a Fabric</h1>
	<p><a href="index.php">Cancel</a><p>

	<form enctype="multipart/form-data" method="post" action="add-one.php">
		
		<label for="fabric_name">Fabric Name<?php if (isset($errors['fabric_name'])) : ?> <strong class="error"> is required</strong><?php endif; ?></label>
		<input name="fabric_name" id="fabric_name" required value="<?php echo $fabric_name; ?>"></input>
		
		<label for="fibre_content">Fibre Content</label>
		<select id="fibre_content" name="fibre_content" >
			
				<?php foreach ($fibres as $key => $value) : ?>
			<option value="<?php echo $key;?>" value="selected"><?php echo $value;?></option>
				<?php endforeach; ?>
				
		</select>	
			
		<label for="fibre_other">Other </label>
		<input name="fibre_other" id="fibre_other" value="<?php echo $fibre_other; ?>"></input>

		<label for="pattern">Color/Pattern<?php if (isset($errors['pattern'])) : ?> <strong class="error"> is required</strong><?php endif; ?></label>
		<input name="pattern" id="pattern" required value="<?php echo $pattern; ?>"></input>

		<label for="width">Width</label>
		<select id="width" name="width" >
		<?php foreach ($widths as $key => $value) : ?>
			<option value="<?php echo $key; ?>">	
			 <?php echo $value;?>
			</option> 
				<?php endforeach; ?>
		</select>			
		
		<label for="width_other">Other</label>
		<input name="width_other" id="width_other" value="<?php echo $width_other; ?>"></input>
		
		<label for="quantity">Quantity<?php if (isset($errors['quantity'])) : ?> <strong class="error"> must be a number.</strong><?php endif; ?></label>
		<input name="quantity" id="quantity" required value="<?php echo $quantity; ?>"></input>
		
		<select id="q_units" name="q_units">
		<?php foreach ($quantity_units as $key => $value) : ?>
			<option value="<?php echo $key; ?>">	
			 <?php echo $value;?>
			</option> 
				<?php endforeach; ?>
		</select>
		
		<label for="cost">Cost ($CDN)</label>
		<input name="cost" id="cost" value="<?php echo $cost; ?>"></input>
		
		<select id="c_units" name="c_units">
		<?php foreach ($cost_units as $key => $value) : ?>
			<option value="<?php echo $key; ?>">	
			 <?php echo $value;?>
			</option> 
				<?php endforeach; ?>
		</select>	
		
		<label for="location">Location Purchased</label>
		<input name="location" id="location" value="<?php echo $location; ?>"></input>
		
		<label for="date_purchased">Date Purchased</label>
		<input name="date_purchased" id="date_purchased" value="0000-00-00"></input>
		<label for="notes">Notes</label>
		<textarea name="notes" value="<?php echo $notes; ?>"></textarea>	
		<input type="file" name="preview">

 	<button type="submit">Save</button>
	</form>
	</div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="js/jquery.js"></script>
</body>
</html>