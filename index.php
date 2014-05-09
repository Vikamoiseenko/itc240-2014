<?php

include("password.php");


//parametrs: server, username, password, database
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

//query and store in $result
//SAFE ONLY WITH KNOWN VALUES!!!!!
$result = $mysql->query('SELECT * FROM animals;');

//do not use
//$mysql->query("INSERT INTO animals VALUES ($type);");

//Prepare statements are safe
//send to database for preparation
//$query = $mysql->prepare("SELECT * FROM animals;");
//then execute
//$query->execute();
//get the rows that resulted
//$result = $query->get_result();


//$result is not an array, but acts like one

//loop through the rows and output them
foreach ($result as $row) {
?>
<li> <?= $row["type"] ?> has <?= $row["legs"] ?> legs.
<?php
}