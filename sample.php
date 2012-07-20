<?php
//get results from database
?>
<select name="whatever">
<?php
while($row = mysql_fetch_assoc($results))
{
	?>
	<!-- Separated HTML and PHP -->
	<option value="<?php echo $row['whateveragain']?>;?>"
	   <?php
		if($row['whateveragain'] == 'somevalue')
			echo ("selected=\"selected\"");
>
	   <?php echo $row['whateveragain']?>
	</option>
	<?php
}
?>
</select>

