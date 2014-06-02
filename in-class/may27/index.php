<?php

$name = ""; //if we don't know what is your name
//header("Set-Cookie: hello=world");
echo "Before request: $name";
if (isset($_COOKIE["your_name"])) {
$name = $_COOKIE["your_name"];
}
echo "After cookie: $name";

if(isset($_REQUEST["name"])) {
setcookie("your_name", $_REQUEST["name"]);
$name = $_REQUEST["name"];
}
echo "After request: $name";
?>
<!doctype html>
this is a blank page
<form action="index.php">
	<input placeholder="First name" 
	name="name"
	value="<?= $name ?>"
	>
</form>
<pre>
<?php
print_r($_COOKIE);
?>
<pre>