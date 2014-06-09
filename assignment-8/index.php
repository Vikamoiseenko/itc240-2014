<?php
include("password.php");
include("function.php");
$get = get_request("get");
echo $get;
?>

<!doctype html>
<html>
<head>
<title>Assignment 8</title>
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

<table>
<p>Figure Skating</p>
<thead>
<tr>
<th><a href="?get=athlete">Athlete</a></th>
<th><a href="?get=events">Events</th>
<th><a href="?get=country">Country</th>
<th>Medal</th>
</tr>
<?php


$events = get_request('events');
$athlete = get_request('athlete');
$country = get_request('country');
if($events) {
$sochi = get_events();
} else if($athlete) {
$sochi = get_athlete();
} else if ($country){
$sochi = get_country();
}
foreach ($sochi as $row) {
?>

<tr>
<td><?= clean($row["Athlete"]); ?> <img src="<?= $row["Image"] ?>">
<td><?= clean($row["Events"]); ?>
<td><?= clean($row["Country"]); ?>
<td><?= clean($row["MEDAL"]); ?>
<?php 
}
?>

</table>


</body>
</html>