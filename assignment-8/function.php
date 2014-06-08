<?php
function get_array($array, $param) {
if (isset($array[$param])) {
return $array[$param];
}
return false;
}

function get_request($param) {
  //if this was found in $_REQUEST
  if (isset($_REQUEST[$param])) {
    //exit early
    return $_REQUEST[$param];
  }
  //if not found
  return false;
}

$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");

function update_food() {
global $mysql;
$select = $mysql->prepare('UPDATE food_track SET calories=?, name_food=?, food_on=? WHERE id=?');
$select->bind_param("issi", $calories, $name_food, $food_on, $id);
$select->execute();
return $select->get_result();
}
function insert_food(){
global $mysql;
$insert = $mysql->prepare('INSERT INTO food_track (calories, name_food, food_on) VALUES (?, ?, NOW());');
$insert->bind_param("is", $_REQUEST["calories"],  $_REQUEST["name_food"]);
$insert->execute();

}
function get_food() {
	global $mysql;
	$prepared = $mysql->prepare('SELECT * FROM food_track');
	$prepared->execute();
	return $prepared->get_result();
}
function input($name) {
?>
<input name="<?= $name ?>">
<?php
}


?>