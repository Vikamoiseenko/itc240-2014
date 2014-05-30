<!doctype html>
<html>
<head>
<style>
body {
float: left;
background-color: #00FFFF;
margin: 15px;
padding:0px;
font-family:'Times New Roman', Times, serif;
font-size:16px;
}
table {
background-color: #FFFF00;
margin: 10px;
padding: 5px;
text-align: center;
border-radius: 15px;
}
thead, th, td {
border: 1px solid black;
padding: 6px;
margin: 5px;

}
p {
font-size: 30px;
text-align: justify;
color: #383838;
}
button {
float: center;
background-color:  	#FF0000;
}
</style>
</head>
<body>

<p><b>Welcome to Neko's activity and food track</b></p>
<p>Food</p>
<?php
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");
$calories = "";
if (isset($_REQUEST["update"])) {
	$get_update = 'SELECT * FROM food_track where id = ?';
	$select = $mysql->prepare($get_update);
	$select->bind_param("i", $_REQUEST["update"]);
	$select->execute();
	$existing = $select->get_result()->fetch_array();
	$calories = $existing["calories"];
}
?>
<form method="POST" action="food.php">
<table>
<tr>
<td><label for="calories">Enter calories</label></td>
<td><input name="calories" value="<?= $calories ?>">
</tr>
<tr>
<td><label for="name_food">Enter type food</label></td>
<td><input name="name_food" value=""></td>
</tr>
<tr>
<td><label for="food_on">Enter date in the format yyyy-mm-dd</label></td>
<td><input name="food_on" value=""></td>
<input name="id" type="hidden">
<td><button>Get Result</button></td>
</tr>
</table>
</form>

<p>Activity</p>
<form method="POST" action="activity.php">
<table>
<tr>
<td><label for="name_activity">Enter activity</label></td>
<td><input name="name_activity" value="">
</tr>
<tr>
<td><label for="cal_burn">Enter burn calories</label></td>
<td><input name="cal_burn" value=""></td>
</tr>
<tr>
<td><label for="activity_on">Enter date in the format yyyy-mm-dd</label></td>
<td><input name="activity_on" value=""></td>
<input name="id" type="hidden">
<td><button>Get Result</button></td>
</tr>
</table>
</form>

<a href="?sort=name_activity">Activity</a>
<a href="?sort=name_food"> Food</a>

<?php
//make connection
$line = 'name_food';
if(isset($_REQUEST["sort"])) {
$line = $_REQUEST["sort"];
}
$line = $mysql->real_escape_string($line);

$whitelist = [
        "calories" => true,
        "name_food" => true,
     ];
    
    if (!isset($whitelist[$line])) {
        $line = 'name_food';
    }
echo "SELECT * FROM food_track ORDER BY $line DESC;";
$prepared = $mysql->prepare("SELECT * FROM food_track ORDER BY $line DESC;");
    //don't need to bind - no parameters!
    $prepared->execute();
    $results = $prepared->get_result();
?>

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
	<td><b>UPDATE:</b> <a href="?update=<?= $row["id"] ?>">&bull;</a></td> 
<?php
}
?>
</table>

<?php
$sumQuery = $mysql->prepare('SELECT SUM(calories) AS sum FROM food_track;');
    //don't need to bind, no parameters
    $sumQuery->execute();
    //results don't come back from DB until get_result
    $sumResult = $sumQuery->get_result();

    $sum = $sumResult->fetch_array();
    
    $maxQuery = $mysql->prepare('SELECT MAX(calories) AS calories FROM food_track;');
    $maxQuery->execute();
    $maxResult = $maxQuery->get_result();
    $max = $maxResult->fetch_array();
    
    $countResult = $mysql->query('SELECT COUNT(*) AS rows FROM food_track;');
    $count = $countResult->fetch_array();
?>

<table>
<p>Result</p>
<thead>
<tr>
<th>Total Calories</th>
<th>Food with max cal</th>
<th>How many times</th>
</tr>
<tr>
	<td><?= $sum["sum"] ?>
	<td><?= $max["calories"] ?>
	<td><?= $count["rows"] ?>
</table>

<?php
//make connection
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

$line = 'name_activity';
if(isset($_REQUEST["sort"])) {
$line = $_REQUEST["sort"];
}
$line = $mysql->real_escape_string($line);

$whitelist = [
        "name_activity" => true,
        "name_food" => true,
     ];

    if (!isset($whitelist[$line])) {
        $line = 'name_activity';
    }

$prepared = $mysql->prepare("SELECT * FROM activity ORDER BY $line DESC;");
    //don't need to bind - no parameters!
    $prepared->execute();
    $result = $prepared->get_result();	
?>

<table>
<p>Activity</p>
<thead>
<tr>
<th>Activity</th>
<th>Calories burn</th>
<th>Date</th>
</tr>

<?php
foreach ($result as $row) {
?>
<tr>
	<td><?= htmlentities($row["name_activity"]) ?>
	<td><?= htmlentities($row["cal_burn"]) ?>
	<td><?= htmlentities($row["activity_on"]) ?>
	<td><b>UPDATE:</b> <a href="?update=<?= $row["id"] ?>">&bull;</a></td> 
</tr>
<?php
}
?>
</table>

<?php
$sumQuery = $mysql->prepare('SELECT SUM(cal_burn) AS sum FROM activity;');
    //don't need to bind, no parameters
    $sumQuery->execute();
    //results don't come back from DB until get_result
    $sumResult = $sumQuery->get_result();

    $sum = $sumResult->fetch_array();
    
    $maxQuery = $mysql->prepare('SELECT MAX(cal_burn) AS calories FROM activity;');
    $maxQuery->execute();
    $maxResult = $maxQuery->get_result();
    $max = $maxResult->fetch_array();
    
    $countResult = $mysql->query('SELECT COUNT(*) AS rows FROM activity;');
    $count = $countResult->fetch_array();
?>
<table>
<p>Result</p>
<thead>
<tr>
<th>Total Calories</th>
<th>Activity with max cal</th>
<th>How many times</th>
</tr>
<tr>
	<td><?= $sum["sum"] ?>
	<td><?= $max["calories"] ?>
	<td><?= $count["rows"] ?>
</tr>
</table>


</body>
</html>

//My code is almost working, except Update function and I have an error in line 105 and 187 (Call to a member function execute() on a non-object). If you could please help me to fix it, it will be great. Thanks 