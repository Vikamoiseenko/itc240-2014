<!doctype html>
<html>
<?php

$method = $_SERVER["REQUEST_METHOD"];
echo $method;
if ($method == "GET") {
?>

	<form method="post">
	<input value="noun" name="noun">
	<input value="verb" name="verb">
	<input value="adjective" name="adjective">
	<input name="number_1" placeholder="number_1">
	<input name="number_2" placeholder="number_2">
	<input type="checkbox" value="awesome" name="is_awesome">
	<label for="is_awesome">Do you want to get a story?</label>
		<button>POST</button>
	</form>

<?php
} else {
?>
	<pre> <!-- pre format  -->
	<?php print_r($_REQUEST);?>
	</pre>

	I buy: <?= $_REQUEST["noun"] ?>
<?php
$verb = $_REQUEST["verb"];
$post_voting = $verb - 18;

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
<a href="assignment2.php">GET</a>
<?php
}
?>
</html>