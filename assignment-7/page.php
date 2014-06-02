<!doctype html>
<html>
<head>
<style>
<!--<link href="style.css" type="text/css" rel="stylesheet"> -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<?php
$style = '';
if (isset($_REQUEST['style'])) {
$style = $_REQUEST['style'];
}
if ($style == "style") {
include("style.php");
} else if ($style == "style2") {
include("style2.php");
} else {
include("style.php");
}
?>
</style>


</head>
<body>
<h1>BOOKS</h1>
<a href="?show=cover">Cover view</a>
<a href="?show=book">List view</a>
<a href="?style=style2">Dark theme</a>
<a href="?style=style">Light theme</a>


<?php

if ($show == "cover") {
include("cover.php");
} else if ($show == "book") {
include("book.php");
} 
?>
</body>
</html>