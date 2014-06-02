<html>
<head>
<style>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<?php

if ($style == "style") {
include("style.php");
} else if ($style == "style2") {
include("style2.php");
} else {
include("style1.php");
}
?>
</style>
</head>
<body>
<form action="book.php" method="get">
<label for="sort">Sort by&nbsp;</label><select class="sortByDropdown" name="sort" id="sort" onchange="this.form.submit();">
<option value="<?= $name ?>">Title A-Z</option>
<option value="<?= $name ?>">Title Z-A</option>
<option value="<?= $author ?>">Author A-Z</option>
<option value="<?= $author ?>">Author Z-A</option>
</select>
</form>

<?php
include("password.php");
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");
$name = "";
$image = "";
$author = "";
$books = $mysql->query('SELECT * FROM books');
if(isset($_REQUEST['get'])) {
if ($_REQUEST['get'] == 'name') {
$books = $mysql->query('SELECT * FROM books order by name ASC;');
} else if ($_REQUEST['get'] == 'name') {
$books = $mysql->query('SELECT * FROM books order by  name DESC;');
} else if ($_REQUEST['get'] == 'author') {
$books = $mysql->query('SELECT * FROM books order by author ASC ;');

} else if ($_REQUEST['get'] == 'author') {
$books = $mysql->query('SELECT * FROM books order by author DESC ;');
}
}
?>
<?php
foreach ($books as $row) {
?>
<ul>
<li><b><?= $row["name"] ?></b> 
<li><b><i><?= $row["author"] ?></b></i> 
<li><i><?= $row["description"] ?></i>
</ul>
<?php
}
?>
</body>
</html>