<?php
$air = $mysql->query('SELECT Departure_Date, f.Flight_Number, Crew_Last_Name, Crew_First_Name
FROM Aircraft a, Flight f, Crew c, Trip_Crew tc, Trip t
WHERE t.Tripid=tc.TripId 
AND c.CrewId=tc.CrewId
AND t.Aircraft_Tail_Number=a.Aircraft_Tail_Number
AND f.Flight_Number=t.Flight_Number
AND Aircraft_Model="BE737"
ORDER by Departure_Date;');
?>
<table>
<p>Show departure date, flight number, crew lastname and crew firstname of all flights using a Boeing 737, sorted by departure date</p>
<thead>
<tr>
<th>Aircraft Tail Number</th>
<th>Aircraft Model</th>
<th>Aircraft Capacity</th>
<th>AirlineID</th>
</tr>
<?php
foreach ($air as $row) {
?>

<tr> 	
	<td><?= $row["Departure_Date"] ?>
	<td><?= $row["Flight_Number"] ?>
	<td><?= $row["Crew_Last_Name"] ?>
	<td><?= $row["Crew_First_Name"] ?>
<?php
}
?>
</table>