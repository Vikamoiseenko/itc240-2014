<!doctype html>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
$show = "cover";
if (isset($_REQUEST["show"])) {
$show = $_REQUEST["show"];
}
include("page.php");
?>
</body>
</html>
