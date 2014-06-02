<?php
function make_cookie($name, $value) {
    setcookie($name, $value, time() + 60 * 60 * 24 * 30, "/");
  }
  
  function delete_cookie($name) {
    setcookie($name, "", 10, "/");
  } 
  $name = "";
$image = "";
$description = "";
$author = "";
if(isset($_COOKIE["name"])) {
$name = $_COOKIE['name'];
}
if(isset($_COOKIE["image"])) {
$image = $_COOKIE['image'];
}
if(isset($_COOKIE["description"])) {
$description = $_COOKIE['description'];
}
if(isset($_COOKIE["author"])) {
$author = $_COOKIE['author'];
}

make_cookie('name', $name);
make_cookie('image', $image);
make_cookie('description', $description);
make_cookie('author', $author);
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
} else {
include("style.php");
}
?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</style>
</head>
<body>

<form action="cover.php" method="get">
<label for="sort" class="sortByLabel">Sort by&nbsp;</label>
<select class="sortByDropdown" onchange="this.form.submit();">
<option value="<?= $name ?>">Title A-Z</option>
<option value="<?= $name ?>">Title Z-A</option>
<option value="<?= $image ?>">Author A-Z</option>
<option value="<?= $image ?>">Author Z-A</option>
</select>
</form>

<?php
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

$books = $mysql->query('SELECT * FROM books');
if(isset($_REQUEST['get'])) {
if ($_REQUEST['get'] == 'name') {
$books = $mysql->query('SELECT * FROM books order by name ASC;');
} else if ($_REQUEST['get'] == 'name') {
$books = $mysql->query('SELECT * FROM books order by  name DESC;');
} else if ($_REQUEST['get'] == 'author') {
$books = $mysql->query('SELECT * FROM books order by image ASC ;');
} else if ($_REQUEST['get'] == 'author') {
$books = $mysql->query('SELECT * FROM books order by image DESC ;');
}
}
?>

<?php
foreach ($books as $row) {
?>
<table>
<tr>
<div class="img">
<td><img src=<?= $row["image"]; ?>>
</tr>
<b><?= $row["name"] ?></b>
<?php
}
?>
</body>
</html>