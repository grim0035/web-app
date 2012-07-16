<?php

require_once 'includes/db.php';
//pointer to db
$sql = $db->query('
	SELECT id, fabric_name, pattern, quantity, cost
	FROM incontrol
	ORDER BY cost DESC
');

$results = $sql->fetchAll(); //gets data from db

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Inventory &middot; InControl</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>

	<table>
		<caption>Inventory Control</caption> <!-- summary for the table-->
			<colgroup>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col>
			</colgroup>
		<thead> <!-- table header cells -->
			<tr>
				<!-- table =scope defines what direction the <th> is labelling: col or row -->
				<th scope="col">Preview</th>
				<th scope="col">Pattern</th>
				<th scope="col">Fibre Content</th>
				<th scope="col">Width</th>
				<th scope="col">Quantity Remaining</th>
				<th scope="col">Cost</th>		
			</tr>
		</thead>
		<?php foreach ($results as $fabric) :?>
			<tr>
				<td scope="col"></td>
				<td scope="col"><a href="edit.php?id=<?php echo $fabric['id']; ?>"><?php echo $fabric['pattern']; ?></a></td>
				<td scope="col"></td>
				<td scope="col"></td>
				<td scope="col"><?php echo $fabric['quantity']; ?></td>
				<td scope="col"><?php echo $fabric['cost']; ?></td>
	
			</tr>
		<?php endforeach; ?>
		<tfoot> <!-- table header cells -->
			<tr>
				<!-- table =scope defines what direction the <th> is labelling: col or row -->
				<td scope="col" colspan="3"><div class="buttons">
<a href="add-one.php">Add Fabric</a>
</div></td>
			</tr>
		</tfoot>
	</table>

</body>
</html>