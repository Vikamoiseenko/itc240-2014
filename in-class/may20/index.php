<!doctype html>
<html>
<body>
	<form method="POST" action="edit.php">
<input placeholder="type" name="type">
<input placeholder="calories" name="calories">
<input type="submit">
</form>
<a href="?sort=type">Type</a>
<a href="?sort=id">ID</a>
<a href="?sort=calories">Calories</a>




<h1>WHAT YOU ATE: </h1>
<?php
include ("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");
$column = "calories";
//escaping
if (isset($_REQUEST["sort"])) {
$column = $_REQUEST["sort"];
}
$column = $mysql->real_escape_string($column);

$whitelist = [
"calories" => true,
"id" => true,
"type" => true];
if (!isset($whitelist[$column])) {
$column = 'calories';
}

$prepared = $mysql->prepare("SELECT * FROM tracker_food ORDER BY $column DESC");
$prepared->execute();
$results = $prepared->get_result();

foreach($results as $row) {
?>
<div> <?= htmlentities($row["calories"]) ?> calories from
<?= htmlentities($row["type"]) ?>
</div>
<?php
}

$sumQuery = $mysql->prepare('SELECT SUM(calories) as sum from tracker_food;');
$sumQuery->execute();
$sumResult = $sumQuery->get_result();

$sum = $sumResult->fetch_array();
//MAX function
$maxQuery = $mysql->prepare('SELECT MAX(calories) as max from tracker_food;');
$maxQuery->execute();
$maxResult = $maxQuery->get_result();
$max = $maxResult->fetch_array();

//COUNT
$countResult = $mysql->query('SELECT COUNT(*) as row from tracker_food;');
$count = $countResult->fetch_array();
?>
<div> YOUR total colories input is: <?= $sum["sum"] ?> 
</div>
<div> YOUR highes input was: <?= $max["max"] ?> 
</div>
<div> How many you eat: <?= $count["row"] ?> 
</div>
</body>
</html>