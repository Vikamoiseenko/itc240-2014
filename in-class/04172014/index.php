<!doctype html>
<html>
<?php

$method = $_SERVER["REQUEST_METHOD"];
echo $method;
if ($method == "GET") {
?>

	<form method="post">
	<input value="Victoria" name="first_name">
	<input name="age" placeholder="age">
	<input type="checkbox" value="awesome" name="is_awesome">
	<label for="is_awesome">Are you awesome?</label>
		<button>POST</button>
	</form>

<?php
} else {
?>
	<pre> <!-- pre format  -->
	<?php print_r($_REQUEST);?>
	</pre>

	Your name is: <?= $_REQUEST["first_name"] ?>
<?php
$age = $_REQUEST["age"];
$post_voting = $age - 18;

if ($post_voting >= 0) {
?>
?>
You have been able to vote for <?= $post_voting ?> years.

<?php
} else {
?>
You cannot vote!!
<?php
}

if (isset($_REQUEST["is_awesome"])) {
echo "Also, you are awesome.";
}
?>
<a href="index.php">GET</a>
<?php
}
?>
</html>