<?php
$dep = $mysql->query('SELECT Departure_Date, f.Flight_Number, Aircraft_Model, Aircraft_Capacity
FROM Aircraft a, Flight f, Trip t
WHERE t.Aircraft_Tail_Number=a.Aircraft_Tail_Number
AND f.Flight_Number=t.Flight_Number
AND Month(Departure_Date) = 1 and DAYOFMONTH(Departure_Date) = 16;');
?>
<table>
<p>show departure date, flight number, aircraft model and aircraft capacity for all flights that departed on February 16</p>
<thead>
<tr>
<th>Departure_Date</th>
<th>Flight_Number</th>
<th>Aircraft_Model</th>
<th>Aircraft_Capacity</th>
</tr>
<?php
foreach ($dep as $row) {
?>

<tr> 	
	<td><?= $row["Departure_Date"] ?>
	<td><?= $row["Flight_Number"] ?>
	<td><?= $row["Aircraft_Model"] ?>
	<td><?= $row["Aircraft_Capacity"] ?>
<?php
}
?>
</table>