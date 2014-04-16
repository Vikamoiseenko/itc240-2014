<?php

$variable = "text";


/*
$_SERVER - server-specific information
$_COOKIE - all the cookies that are assigned
$_REQUEST - URL parametrs or form submission
$_FILES - files that are uploaded
$_SESSION
*/

//print_r ($_REQUEST);
//create a variable
$name = htmlentities ($_REQUEST["name"]);
if ($name == "Victoria") {
	$name = "The beautiful Victoria";
}
//SANITIZATION:
//htmlentities()

if (isset($_REQUEST["last_name"])) {
$last_name = $_REQUEST["last_name"];
} else {
$last_name = "";
}

?>
<!doctype html>
<html>
	<body>
		Hello, 
		<?php echo $name; ?>
		<?= htmlentities ($last_name); ?>!
		
//create form		
		<form method="post">
			<input name="comment">
			<input type="hidden" value="123" name="nonce" > 
			<button>Submit</button> 
		</form>
		
//comment in form		
<?php
if (isset($_REQUEST["comment"])) {
echo $_REQUEST["comment"];
}
?>
		</body>
</html>		

