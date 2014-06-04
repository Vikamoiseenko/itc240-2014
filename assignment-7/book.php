<html>
<head>
<style>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
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
</style>
</head>
<body>
<!<form action="book.php" method="get">
<label for="sort" class="sortByLabel">Sort by&nbsp;
<select name="get">
<option value="name">Title A-Z</option>
<option value="name desc">Title Z-A</option>
<option value="author">Author A-Z</option>
<option value="author desc">Author Z-A</option>
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
        "author" => true,
	 "name desc" => true,
        "author desc" => true,
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
<ul>
<li><b><?= htmlentities($row["name"]) ?></b> 
<li><b><i><?= htmlentities($row["author"]) ?></b></i> 
<li><i><?= htmlentities($row["description"]) ?></i>
</ul>
<?php
}
?>

</body>
</html>