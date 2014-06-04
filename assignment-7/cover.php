<?php
function make_cookie($name, $value) {
    setcookie($name, $value, time() + 60 * 60 * 24 * 30, "/");
  }
  
  function delete_cookie($name) {
    setcookie($name, "", 10, "/");
  } 
  
$book_get = "name";
if (isset($_COOKIE["book_get"])) {
$book_get = $_COOKIE["book_get"];
}
if (isset($_REQUEST["get"])) {
$book_get = $_REQUEST["get"];
make_cookie("book_get", $book_get);
}
?> 
<!doctype html>
<html>
<head>
<style>
<?php
if (isset($_REQUEST['style'])) {
$style = $_REQUEST['style'];
}
$style = '';
if ($style == "style") {
include("style.php");
} else if ($style == "style2") {
include("style2.php");
} 
?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</style>
</head>
<body>

<form action="cover.php" method="get">
<label for="sort" class="sortByLabel">Sort by&nbsp;</label>
<select name="get">
<option value="name">Title A-Z</option>
<option value="name desc">Title Z-A</option>
<option value="image">Author A-Z</option>
<option value="image desc">Author Z-A</option>
</select>
<input type="submit">
</form>

<?php
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");
$books =  $mysql->query('SELECT * FROM books');
$get = $mysql->real_escape_string($book_get);

    $whitelist = [
        "name" => true,
        "image" => true,
	 "name desc" => true,
        "image desc" => true,
    ];

if (!isset($whitelist[$get])) {
	$get = 'name';
}


$prepare = $mysql->prepare("SELECT * FROM books ORDER BY $get;");

$prepare->execute();
$results = $prepare->get_result();

?>
<?php
foreach ($results as $row) {
?>
<table>
<tr>
<div class="img">
<td><img src=<?= htmlentities($row["image"]); ?>>
</tr>
<b><?= htmlentities($row["name"]) ?></b>

<?php
}
?>
</body>
</html>