<?php
include("password.php");
include("function.php");

$sort = get_request("sort");

get_array($_REQUEST, "sort");

$food = insert_food();
update_food();
$food = get_food();

?>
<!doctype html>
<html>

<link href="style.css" type="text/css" rel="stylesheet">

<body>
<p><b>Welcome to Neko's food track</b></p>
<form method="POST">
<table>
<tr>
<td><label for="calories">Enter calories</label></td>
<td><?php input("calories"); ?>
</tr>
<tr>
<td><label for="name_food">Enter type food</label></td>
<td><?php input("name_food"); ?></td>
</tr>
<tr>
<td><label for="food_on">Enter date in the format yyyy-mm-dd</label></td>
<td><?php input ("food_on"); ?></td>
<input name="id" type="hidden">
<td><button>Get Result</button></td>
</tr>
</table>
</form>
<a href="?sort=name_activity">Activity</a>
<table>
<p>Food</p>
<thead>
<tr>
<th>Calories</th>
<th>Type of food</th>
<th>Date</th>
</tr>

<?php
foreach($food as $row) {
?>
<tr>
<td><?= htmlentities($row["calories"]) ?>
<td><?= htmlentities($row["name_food"]) ?>
<td><?= htmlentities($row["food_on"]) ?>
<td><b>UPDATE:</b> <a href="?update=<?= $row["id"] ?>">&bull;</a></td> 
<?php
}
?>
</table>



</body>
</html>