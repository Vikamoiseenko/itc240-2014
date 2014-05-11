<!doctype html>
<html>
<head>
<style>
table {
margin: left;
}
thead, th, td {
border: 1px solid black;
padding: 10px;
}
img { 
float: center;

height:300px;
}
</style>
</head>

<body>
<?php
$page_title = "Assignment-4 - SQL";

include("header.php");
include("password.php");

//parametrs: server, username, password, database
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

//result first table
$sochi = $mysql->query('SELECT * FROM Figure_skating;');
if(isset($_REQUEST['get'])) {
if ($_REQUEST['get'] == 'athlete') {
$sochi = $mysql->query('SELECT * FROM Figure_skating order by athlete ASC;');
} else if ($_REQUEST['get'] == 'events') {
$sochi = $mysql->query('SELECT * FROM Figure_skating order by events DESC;');
} else if ($_REQUEST['get'] == 'Country') {
$sochi = $mysql->query('SELECT * FROM Figure_skating Where MEDAL = "Gold" order by Country DESC ;');
}
}
?>

<table>
<p>Figure Skating</p>
<thead>
<tr>
<th><a href="?get=athlete">Athlete</a></th>
<th><a href="?get=events">Events</th>
<th><a href="?get=Country">Country</th>
<th>Medal</th>
</tr>
<?php
foreach ($sochi as $row) {
?>

<tr> 	
	<td><?= $row["Athlete"] ?> <img src="<?= $row["Image"] ?>">
	<td><?= $row["Events"] ?>
	<td><?= $row["Country"] ?>
	<td><?= $row["MEDAL"] ?>
<?php
}
?>
</table>

</body>
</html>