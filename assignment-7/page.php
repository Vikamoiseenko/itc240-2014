<!doctype html>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>BOOKS</h1>
<a href="?show=cover">Cover view</a>
<a href="?show=book">List view</a>

<?php

if ($show == "cover") {
include("cover.php");
} else if ($show == "book") {
include("book.php");
}

?>
</body>
</html>