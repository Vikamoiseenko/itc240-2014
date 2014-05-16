<!doctype html>
<html>
<body>
<form action="edit.php" method ="POST">
<input name="name" placeholder="Your name">
<textarea name="comment"></textarea>
<input type="submit">
</form>
</body>
</html>

<?php
include("../../password.php");

//parametrs: server, username, password, database
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

if($_SERVER["REQUEST_METHOD"] =="POST") {
$query = 'INSERT INTO guestbook (Name, Comment, Posted_on) VALUES (?, ?, now()); ';	
$prepared = $mysql->prepare($query);
$prepared->bind_param("ss", $_REQUEST["name"], $_REQUEST["comment"]);
$prepared->execute();
}
?>