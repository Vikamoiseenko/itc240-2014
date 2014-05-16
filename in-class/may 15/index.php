<?php
include("../../password.php");

//parametrs: server, username, password, database
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");


?>

<!doctype html>
<html>
<body>
<a href="edit.php">Click here to comment</a>
<div class="comments">
<?php
//$select = 'SELECT * FROM guestbook;';
$select = 'SELECT Name, Comment, MONTH(Posted_on) as month, YEAR(Posted_on)as year FROM guestbook;';
$prepared = $mysql->prepare($select);
$prepared->execute();

$comments = $prepared->get_result();

foreach($comments as $comment) {
?>	
<b><?= $comment["Name"] ?></b> 
-
posted on: <?= $comment["month"] ?>/<?= $comment["month"] ?>
<pre>
<?= $comment["Comment"] ?>
</pre>
<?php
}
?>
</body>
</html>