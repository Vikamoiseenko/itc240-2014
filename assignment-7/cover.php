<?php
function make_cookie($name, $value) {
    setcookie($name, $value, time() + 60 * 60 * 24 * 30, "/");
  }
  
  function delete_cookie($name) {
    setcookie($name, "", 10, "/");
  } 
  
$book_get = "";
if (isset($_COOKIE["book_get"])) {
$book_get = $_COOKIE["book_get"];
}  
if (isset($_REQUEST["get"])) {
$book_get = $_REQUEST["get"];
}
make_cookie("book_get", $book_get);
?> 
<!-- $book_name = "";
$book_image = "";
$book_description = "";
$book_author = "";
if(isset($_COOKIE["book_name"])) {
$book_name = $_COOKIE["book_name"];
}
if(isset($_COOKIE["name"])) {
$book_name = $_REQUEST["name"];
}
if(isset($_COOKIE["book_image"])) {
$book_image = $_COOKIE["book_image"];
}
if(isset($_COOKIE["book_image"])) {
$book_image = $_REQUEST["image"];
}
if(isset($_COOKIE["book_description"])) {
$book_description = $_COOKIE["book_description"];
}
if(isset($_COOKIE["book_description"])) {
$book_description = $_REQUEST["description"];
}
if(isset($_COOKIE["book_author"])) {
$book_author = $_COOKIE["book_author"];
}
if(isset($_COOKIE["book_author"])) {
$book_author = $_REQUEST["author"];
}
make_cookie("book_name", $book_name);
make_cookie("book_image", $book_image);
make_cookie("book_description", $book_description);
make_cookie("book_author", $book_author);
?> -->
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
<select name="Sort by">
<option value="<?= $name ?>">Title A-Z</option>
<option value="<?= $name2 ?>">Title Z-A</option>
<option value="<?= $image ?>">Author A-Z</option>
<option value="<?= $image2 ?>">Author Z-A</option>
</select>
</form>

<?php
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

$books =  $mysql->query('SELECT * FROM books');
?>
<?php
$get = 'name';
if(isset($_REQUEST['get'])) {
if(isset($_REQUEST['get'])) {
$get = $_REQUEST['get'];
}
$get = $mysql->real_escape_string($get);

    $whitelist = [
        "name" => true,
        "image" => true,
		"name2" => true,
        "image2" => true,
    ];

 if (!isset($whitelist[$get])) {
        $get = 'name';
    }
	}

$prepare = $mysql->prepare("SELECT * FROM books ORDER BY $get ASC;");

$prepare->execute();
$results = $prepare->get_result();

?>
<!--
if(isset($_REQUEST['get'])) {
if ($_REQUEST['get'] == 'name') {
$books = $mysql->query('SELECT * FROM books order by name ASC;');
} else if ($_REQUEST['get'] == 'name2') {
$books = $mysql->query('SELECT * FROM books order by  name DESC;');
} else if ($_REQUEST['get'] == 'image') {
$books = $mysql->query('SELECT * FROM books order by image ASC ;');
} else if ($_REQUEST['get'] == 'image') {
$books = $mysql->query('SELECT * FROM books order by image DESC ;');
}
}
-->


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