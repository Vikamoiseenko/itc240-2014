<?php
include("../../password.php");


//parametrs: server, username, password, database
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

//query and store in $result
//SAFE ONLY WITH KNOWN VALUES!!!!!
$result = $mysql->query('SELECT * FROM animals;');

echo "<pre>";
foreach ($result as$row) {
	print_r($row);
}

