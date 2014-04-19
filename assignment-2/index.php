<!doctype html>
<html>

<head>
<title>Assignment 2 - Mad Lib</title>
</head>

<body>
<h1>Mad Lib</h1>
<p>Please, enter the noun, verb, adjective, first number, and second number (between 1-10)</p>

<?php

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
?>
<!-- create a form -->
	<form method="post">
	<label for="noun">Noun</label>
	<input name="noun" placeholder="noun">
	
	<label for="verb">Verb</label>
	<input name="verb" placeholder="verb">
	
	<label for="adjective">Adjective</label>
	<input name="adjective" placeholder="adjective">
	
	<label for="number1">Number</label>
	<input name="number1" placeholder="number1">
	
	<label for="number2">Number</label>
	<input name="number2" placeholder="number2">
	
	<button>GET A STORY</button>
	</form>
<?php
} else {
?>
	<!-- <pre>  pre format  
	<!-- <?php print_r($_REQUEST);?> -->
	<!-- </pre> -->

	<p>My dear Valentine,</p>
	<p>You are so <b> <?= $_REQUEST["adjective"] ?> </b> and sweet. When I see you, I feel like <b> <?= $_REQUEST["noun"] ?> </b>. You smell like caramel. Would you like to go with me at 11 morning on Valentine's day?. There is a great restaurant there. And very yummy food. There is also a fun center where kids can <b> <?= $_REQUEST["verb"] ?> </b> in the pool, hockey and gumball bowling.</p>
<?php
$noun = $_REQUEST["noun"];
$verb = $_REQUEST["verb"];
$adjective = $_REQUEST["adjective"];
$number1 = $_REQUEST["number1"];
$number2 = $_REQUEST["number2"];

if ($number1 == 5) {
?>
	<p>Would you like to go with me at <b> <?= $_REQUEST["number1"] ?> </b> morning on Valentine's day?. Hope you will be available).  </p>

<?php
}
if ($number2 <=10) {
?> 
	<p>They serve potato salad, chicken soup, and give <b> <?= $_REQUEST["number2"] ?> </b> Margaritas free!!!! I hope you can come! It would be so great to see you!!!!</p></p>
<?php
} else {
?>
<p>Do not come, because they do not serve Ice-cream!!!</p>

<?php
}
?>
<a href="assignment2.php">Try one mote time</a>
<?php
}
?>
</body>
</html>