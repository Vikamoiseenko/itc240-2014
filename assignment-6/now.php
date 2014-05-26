<a href="?show=food">Food</a>
<a href="?show=activity">Activity</a>

<table>
<p>Food</p>
<thead>
<tr>
<th>Calories</th>
<th>Type of food</th>
<th>Date</th>
</tr>

<?php
foreach ($results as $row) {
?>

<tr>
	<td><?= htmlentities($row["calories"]) ?></td> 
	<td><?= htmlentities($row["name_food"]) ?></td> 
	<td><?= htmlentities($row["food_on"]) ?></td> 
<?php
}
?>
</table>