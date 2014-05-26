<?php
include("password.php");
$name_activity = $_REQUEST["name_activity"];
$cal_burn = $_REQUEST["cal_burn"];
$activity_on = $_REQUEST["activity_on"];
$id = $_REQUEST["id"];

if (isset($_REQUEST["update"])) {
$get_update = 'SELECT * FROM activity where id = ?';
$select = $mysql->prepare($get_update);
$select->bind_param("i", $_REQUEST["update"]);
$select->execute();
 header("Location: index.php");
} else if ($id) { 
$query = 'UPDATE activity SET name_activity=?, cal_burn=?, activity_on=? WHERE id=?';
$update = $mysql->prepare($query);
$update->bind_param("sisi", $name_activity, $cal_burn, $activity_on, $id);
$update->execute();
} else{
//make connection
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");
$query = 'INSERT INTO activity (name_activity, cal_burn, activity_on) VALUES (?, ?, NOW());';
$insert = $mysql->prepare($query);
$insert->bind_param("si", $_REQUEST["name_activity"],  $_REQUEST["cal_burn"]);
$insert->execute();
header("Location:index.php");
}