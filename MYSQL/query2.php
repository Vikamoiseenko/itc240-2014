<?php
$qu = $mysql->query('SELECT Departure_Date, Departure_Time, f.Flight_Number, f.Flight_Destination
FROM Flight f, Trip t
WHERE f.Flight_Number=t.Flight_Number
AND Arrival_Time IS NULL;');
?>
<table>
<p>show departure date, departure Time, flight number, and destination all flights that do not have an arrival time</p>
<thead>
<tr>
<th>Departure_Date</th>
<th>Departure_Time</th>
<th>Flight_Number</th>
<th>Flight_Destination</th>
</tr>
<?php
foreach ($qu as $row) {
?>

<tr> 	
	<td><?= $row["Departure_Date"] ?>
	<td><?= $row["Departure_Time"] ?>
	<td><?= $row["Flight_Number"] ?>
	<td><?= $row["Flight_Destination"] ?>
<?php
}
?>
</table>