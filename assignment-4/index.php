<!doctype html>
<html>
<head>
<style>
table {
margin: left;
}
thead, th, td {
border: 1px solid black;
padding: 5px;
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
$Aircraft = $mysql->query('SELECT * FROM Aircraft;');
?>
</table>


<table>
<p>Aircraft</p>
<thead>
<tr>
<th>Aircraft Tail Number</th>
<th>Aircraft Model</th>
<th>Aircraft Capacity</th>
<th>AirlineID</th>
</tr>
<?php
foreach ($Aircraft as $row) {
?>

<tr> 	
	<td><?= $row["Aircraft_Tail_Number"] ?>
	<td><?= $row["Aircraft_Model"] ?>
	<td><?= $row["Aircraft_Capacity"] ?>
	<td><?= $row["AirlineID"] ?>
<?php
}
?>
</table>

<!-- result second table -->
<?php
$Airline = $mysql->query('SELECT * FROM Airline');
?>
<table>
<p>Airline</p>
<thead>
<tr>
<th>AirlineID</th>
<th>Airline_Company_Name</th>
<th>Country_Of_ownership</th>
</tr>
<?php
foreach ($Airline as $com) {
?>

<tr> 	
	<td><?= $com["AirlineID"] ?>
	<td><?= $com["Airline_Company_Name"] ?>
	<td><?= $com["Country_Of_ownership"] ?>
<?php
}
?>
</table>

<!-- result third table -->
<?php
$Crew = $mysql->query('SELECT * FROM Crew');
?>
<table>
<p>Crew</p>
<thead>
<tr>
<th>CrewID</th>
<th>Crew Last Name</th>
<th>Crew First Name</th>
<th>Crew Skill Level</th>
</tr>
<?php
foreach ($Crew as $vk) {
?>

<tr> 	
	<td><?= $vk["CrewId"] ?>
	<td><?= $vk["Crew_Last_Name"] ?>
	<td><?= $vk["Crew_First_Name"] ?>
	<td><?= $vk["Crew_Skill_Level"] ?>
<?php
}
?>
</table>

<!-- result fourth table -->
<?php
$Flight = $mysql->query('SELECT * FROM Flight');
?>
<table>
<p>Flight</p>
<thead>
<tr>
<th>Flight Number</th>
<th>Flight Destination</th>
</tr>
<?php
foreach ($Flight as $vk) {
?>

<tr> 	
	<td><?= $vk["Flight_Number"] ?>
	<td><?= $vk["Flight_Destination"] ?>
<?php
}
?>
</table>

<!-- result fifth table -->
<?php
$Trip = $mysql->query('SELECT * FROM Trip');
?>
<table>
<p>Trip</p>
<thead>
<tr>
<th>TripId</th>
<th>Aircraft Tail Number</th>
<th>Flight Number</th>
<th>Departure Date</th>
<th>Departure Time</th>
<th>Arrival Time</th>
</tr>
<?php
foreach ($Trip as $vk) {
?>

<tr> 	
	<td><?= $vk["TripId"] ?>
	<td><?= $vk["Aircraft_Tail_Number"] ?>
	<td><?= $vk["Flight_Number"] ?>
	<td><?= $vk["Departure_Date"] ?>
	<td><?= $vk["Departure_Time"] ?>
	<td><?= $vk["Arrival_Time"] ?>
<?php
}
?>
</table>

<!-- result sixth table -->
<?php
$Trip_Crew = $mysql->query('SELECT * FROM Trip_Crew');
?>
<table>
<p>Trip Crew</p>
<thead>
<tr>
<th>CrewID</th>
<th>TripId</th>
</tr>
<?php
foreach ($Trip_Crew as $vk) {
?>

<tr> 	
	<td><?= $vk["CrewId"] ?>
	<td><?= $vk["TripID"] ?>
<?php
}
?>
</table>
<?php
include("page.php");
?>



</body>
</html>