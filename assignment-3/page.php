<!doctype html>
<html>
<head>
<style>
input {
display:block;
}
.main {
min-height: 500px;
width: 90%;
margin: 5px auto;
padding: 0 10px 10px 10px;
font-family:'Times New Roman', Times, serif;
font-size:16px;
}


</style>
</head>
<div class="main">

<body>
<h1>Russian Food</h1>
<a href="?show=cover">Cover view</a>
<a href="?show=all">List view</a>
<div>
<?= count($food); ?> food available
</div>
<ul>
<?php

foreach($food as $rusFood => $value) {
if ($show == "cover") {
include("cover.php");
} else {
include("food.php");
}
}
?>
</ul>
</body>
</html>