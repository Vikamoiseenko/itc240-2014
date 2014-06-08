<?php
include("password.php");
include("function.php");



//library.com?view=list  or ?view=cover
//$view = $_REQUEST["view"]; wrong way
//right way
$view = get_request("view");
echo $view;


print_r($_COOKIE);
echo get_array($_SERVER, "REQUEST_METHOD");
echo get_array($_COOKIE, "book_get");

update_calories(1, 2000);
$cupcakes = get_cupcakes();
foreach($cupcakes as $row) {
?>
<tr>
<td><?= htmlentities($row["flavor"]) ?>
<td><?= htmlentities($row["calories"]) ?>
<td> <img src="<?= htmlentities($row["image"]) ?>" width=150>
<?php
}
?>


<!doctype html>
<html>
<body>
<?= out("<script>alert(1);</script>"); ?>
<ul>
<li> Pet Shampoo <?= out(groupon(7)) ?>
<li> Cheetos's <?= out(groupon(1)) ?>
<li> Pack of something <?= out(groupon(6)) ?>
</ul>
</body>
</html>