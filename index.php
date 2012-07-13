<?php
/*require_once 'includes/db.php';
//pointer to db
$sql = $db->query('
	SELECT id, 
	FROM incontrol

');

$results = $sql->fetchAll(); //gets data from db

//Display the last error created by our database
//var_dump($db->errorInfo());

*/
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
				<th scope="col">Fabric</th>
				<th scope="col">Fibre Content</th>
				<th scope="col">Width</th>
				<th scope="col">Quantity Remaining</th>
				<th scope="col">Cost</th>		
			</tr>
		</thead>
		<?php //foreach ($results as $fabric) :?>
			<tr>
				<td scope="col"></td>
				<td scope="col"><a href="edit.php?id=<?php //echo $fabric['fabric_name']; ?>"></a></td>
				<td scope="col"><?php //echo $fabric['fibre_content'];?><?php //echo $fabric['fibre_other'];?></td>
				<td scope="col"><?php //echo $fabric['width'];?></td>
				<td scope="col"><?php //echo $fabric['quantity'];?><?php //echo $fabric['q_units'];?></td>
				<td scope="col"><?php // echo $fabric['cost'];?><?php //echo $fabric['c_units'];?></td>
	
			</tr>
		<?php //endforeach; ?>
		<tfoot> <!-- table header cells -->
			<tr>
				<!-- table =scope defines what direction the <th> is labelling: col or row -->
				<td scope="col" colspan="3">Source: IMDB.com</td>
			</tr>
		</tfoot>
	</table>

<div class="buttons">
<a href="add-inventory.php">Add Fabric</a>
</div>


</body>
</html>