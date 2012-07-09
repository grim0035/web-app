<!DOCTYPE HTML>
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
			
		<label for="fibre-other">Other Fibre </label>
		<input name="fibre-other" id="fibre-other"></input>

		<label for="pattern">Color/Pattern</label>
		<input name="pattern" id="pattern"></input>

		<label for="width">Width</label>
		<select id="width" name="width">
			<option value="54-inches">54 inches</option>
			<option value="36-inches">36 inches</option>
		</select>		
		
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
		<input name="date-purchased" id="date-purchased"></input>
		
		<label for="notes">Notes</label>
		<input type="text" name="notes" id="notes"></input>
		
		
		<button type="submit">Save</button>

	</form>
	
</body>
</html>