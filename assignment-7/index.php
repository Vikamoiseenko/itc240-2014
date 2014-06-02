<!doctype html>
<html>
<head>
<style>
<?php
$style = '';
if (isset($_REQUEST['style'])) {
$style = $_REQUEST['style'];
}
if ($style == "style") {
include("style.php");
} else if ($style == "style2") {
include("style2.php");
}else {
include("style.php");
}
?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</style>
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
