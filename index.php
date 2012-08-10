<?php
require_once 'includes/db.php';
require_once 'selected.php';

//pointer to db


$sql = $db->query('
	SELECT id, fabric_name, fibre_content, fibre_other, pattern, width, width_other, quantity, q_units, cost, c_units, location, date_purchased, notes, preview
	FROM incontrol
	ORDER BY cost ASC
');

$sort_cost = $db->query('
	SELECT id, fabric_name, fibre_content, fibre_other, pattern, width_other, quantity, q_units, cost, c_units, location, date_purchased, notes, preview
	FROM incontrol
	ORDER BY cost DESC
');

//var_dump($db->errorInfo());

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
<div class="wrapper">
	<table class="dashboard">
		<caption>InControl > Inventory</caption> <!-- summary for the table-->
			<colgroup>
				<col>
				<col>
				<col>
				<col>
				<col>
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
				<th scope="col"><a href="index.php?sort_name">Name</a></th>
				<th scope="col">Fibre Content</th>
				<th scope="col">Other</th>
				<th scope="col">Pattern</th>
				<th scope="col">Width</th>
				<th scope="col">Other</th>
				<th scope="col">Quantity</th>
				<th scope="col"><a href="?sort_cost">Cost</a></th>
				<th scope="col">Date</th>
			</tr>
		</thead>
		<?php foreach ($results as $fabric) :?>
			<tr>
				<td scope="col"><img src="images/<?php echo $fabric['preview'] ?>"></td>
				<td scope="col"><a href="edit.php?id=<?php echo $fabric['id']; ?>"><?php echo $fabric['fabric_name']; ?></a></td>
				<td scope="col">	
				<?php echo $fibres[$fabric['fibre_content']] ?>
				</td>	
				<td scope="col"><?php echo $fabric['fibre_other']; ?></td>
				<td scope="col"><a href="edit.php?id=<?php echo $fabric['id']; ?>"><?php echo $fabric['pattern']; ?></a></td>
				<td scope="col"><?php echo $widths[$fabric['width']] ?></td>
				<td scope="col"><?php echo $fabric['width_other']; ?></td>
				<td scope="col"><?php echo $fabric['quantity']; ?> <?php echo $quantity_units[$fabric['q_units']] ?></td>
				<td scope="col"><?php echo $fabric['cost']; ?></td>
				<td scope="col"><?php echo $fabric['date_purchased']; ?></td>
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
</div>
</body>
</html>