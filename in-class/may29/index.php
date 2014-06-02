<?php
/*	setcookie(
"itc240", //name
"is awesome",//value
time() + 10 * 24* 60 * 60, //expires (number!) day hours min sec 
"/" //path 
); */

function make_cookie($name, $value) {
setcookie($name, $value, time() + 60 * 24 *24 * 30, "/");
}
function delete_cookie($name) {
setcookie($name, "", time() - 60 * 24, "/");
}

make_cookie("type", "chocolate chip");
make_cookie("hello", "world");

delete_cookie("itc240");
$sample = [
"hello" => "world",
"cookie" => "fortune"
];

$list = [1, 2, 3, 4];

$options = [
"last_name_first" => true,
"show_photos" => true,
"favorite" => "Dad"
];

make_cookie("options", json_encode($options));

if(isset($_COOKIE["options"])) {
$from_cookie = json_decode($_COOKIE["options"], true);
}
?>
<!doctype html>
<html>
	<body>
	<pre>
		<?php print_r($_COOKIE) ?>
		<?= json_encode($sample) ?>
		<?= json_encode($list) ?>
		<?php print_r($from_cookie) ?>
	</pre>
	</body>
</html>