<?php

include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");
$prepared = $mysql->prepare('SELECT * FROM tracker_food');
$prepared->execute();
$results = $prepared->get_result();

$query = 'INSERT INTO tracker_food (calories, type, eaten_on) VALUES (?, ?, NOW());';
$prepared = $mysql->prepare($query);
$prepared->bind_param(
"is",
$_REQUEST["calories"],
$_REQUEST["type"]
);
$prepared->execute();

header("Location: index.php");
?>
