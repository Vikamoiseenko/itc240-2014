<?php
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

$calories = $_REQUEST["calories"];
$name_food = $_REQUEST["name_food"];
$food_on = $_REQUEST["food_on"];
$id = $_REQUEST["id"];
//make connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_REQUEST["update"])) {
$get_update = 'SELECT * FROM food_track where id = ?';
$select = $mysql->prepare($get_update);
$select->bind_param("i", $_REQUEST["update"]);
$select->execute();
 header("Location: index.php");
 
} else if ($id) { 
$query = 'UPDATE food_track SET calories=?, name_food=?, food_on=? WHERE id=?';
$update = $mysql->prepare($query);
$update->bind_param("issi", $calories, $name_food, $food_on, $id);
$update->execute();
} else{
$query = 'INSERT INTO food_track (calories, name_food, food_on) VALUES (?, ?, NOW());';
$insert = $mysql->prepare($query);
$insert->bind_param("is", $_REQUEST["calories"],  $_REQUEST["name_food"]);
$insert->execute();
header("Location:index.php");
}
}