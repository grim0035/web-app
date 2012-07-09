<?php
require_once 'includes/db.php';
//pointer to db
$sql = $db->query('
	SELECT id, 
	FROM incontrol

');

$results = $sql->fetchAll(); //gets data from db

//Display the last error created by our database
//var_dump($db->errorInfo());

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Movies &middot; Assignment 6</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>

	<table width="100%">
	<caption>Favourite "Harrison Ford" Movies</caption> <!-- summary for the table-->
		<colgroup>
			<col>
			<col>
			<col>
		</colgroup>
	<thead> <!-- table header cells -->
		<tr>
			<!-- table =scope defines what direction the <th> is labelling: col or row -->
			<th scope="col">Release Date</th>
			<th scope="col">Movie Title</th>
			<th scope="col">Director</th>
		</tr>
	</thead>
	<?php foreach ($results as $film) :?>
		<tr>
			<td scope="col"><?php echo $film['release_date'];?></td>
			<td scope="col"><a href="single.php?id=<?php echo $film['id']; ?>"><?php echo $film['movie_title'];?></a></td>
			<td scope="col"><?php echo $film['director'];?></td>
		</tr>
	<?php endforeach; ?>
	<tfoot> <!-- table header cells -->
		<tr>
			<!-- table =scope defines what direction the <th> is labelling: col or row -->
			<td scope="col" colspan="3">Source: IMDB.com</td>
		</tr>
	</tfoot>
</table>
<div class="buttons">
<a href="add.php">Add a movie</a>
</div>


</body>
</html>