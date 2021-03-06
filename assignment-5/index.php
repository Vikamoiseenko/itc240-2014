<!doctype html>
<html>
<style>
table {
margin: left;
}
thead, th, td {
border: 1px solid black;
padding: 8px;
	width:20%;
margin:2% auto 2% auto;	
}
p {
	font-size: 1em;
	padding-bottom: 1em;
	line-height: 1.5em;
	text-align: justify;
	color: #383838;
}
</style>
<body>
<?php
$page_title = "Assignment-5";
include("header.php");
include("password.php");

//parametrs: server, username, password, database
$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

$form_item = "";
$form_cost ="";
$form_date ="";
$form_id = "";

if (isset($_REQUEST["update"])){
$get_update = 'SELECT * FROM receipts where id = ?';
	$select = $mysql->prepare($get_update);
$select->bind_param("i", $_REQUEST["update"]);
$select->execute();
$result = $select->get_result();
$row = $result->fetch_array();
$form_item = $row["item"];
$form_cost = $row["cost"];
$form_date = $row["date"];
$form_id = $row["id"];
} else if (isset($_REQUEST["delete"])){
$query = 'DELETE FROM receipts WHERE id = ?;';
$delete = $mysql->prepare($query);
$delete->bind_param("i", $_REQUEST["delete"]);
$delete->execute();
}
?>

<form action="index.php" method="POST">
<table>
<tr>
<td><label for="item">Enter your purchase</label></td>
<td><input name="item" value="<?= $form_item ?>">
</tr>
<tr>
<td><label for="cost">Enter cost</label></td>
<td><input name="cost" value="<?= $form_cost ?>" ></td>
</tr>
<tr>
<td><label for="date">Enter date in the format yyyy-mm-dd</label></td>
<td><input name="date" value="<?= $form_date ?>"></td>
<input name="update_id" type="hidden" value="<?= $form_id ?>">
<td><button>SUBMIT</button></td>
</tr>
</table>
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
$item = $_REQUEST["item"];
$cost =$_REQUEST["cost"];
$date =$_REQUEST["date"];
$id = $_REQUEST["update_id"];

if($id) {
$query = 'UPDATE receipts SET item=?, cost=?, date=? WHERE id=?';
$update = $mysql->prepare($query);
$update->bind_param("sdsi", $item, $cost, $date, $id);
$update->execute();
} else {
$query = 'INSERT INTO receipts (item, cost, date) VALUES (?, ?, ?)';
$insert = $mysql->prepare($query);
$insert->bind_param("sds", $item, $cost, $date);
$insert->execute();
}
}
$receipts = $mysql->query('SELECT * FROM receipts');
?>
<p>Receipts</p>
<?php
foreach ($receipts as $row) {
?>

<ul>
<li><b>Item:</b> <?= $row["item"] ?></li>
<li><b>Cost:</b> <?= $row["cost"] ?></li>
<li><b>Date:</b> <?= $row["date"] ?></li>
<li><b>Update:</b> <a href="?update=<?= $row["id"] ?>">&bull;</a>
	<li><b>Delete:</b> <a href="?delete=<?= $row["id"] ?>">&times;</a>
</ul>

<?php
}
?> 

<?php
$sumV = 'SELECT SUM(cost) AS cost * FROM receipts;';
$getSum = $mysql->prepare($sumV);
$getSum->execute();
$sumResult = $getSum->get_result();
?>
<tr>
<td><b>Total</b></td> 
<td> <?= $sumResult["cost"] ?> </td> 
</tr>
</table>
</body>
</html>
