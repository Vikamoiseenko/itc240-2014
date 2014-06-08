<?php
function out($unclean) {
	$clean = htmlentities($unclean);
	return $clean;
}

function groupon($price) {
	//subtract 1 from price
	$discount = $price - 1;
	//add $ and .99
	$add = '$' . $discount . '.99';
	return $add;
}

function get_request($param) {
	if (isset($_REQUEST[$param])) {
		return $_REQUEST[$param];
	}
	return false;
}

function get_array($array, $param) {
	if (isset($array[$param])) {
		return $array[$param];
	}
	return false;
}

$mysql = new mysqli("localhost", "vmoise01", $mysql_pass, "vmoise01");


function update_calories($id, $calories) {
	global $mysql;
	$prepared = $mysql->prepare('UPDATE cupcakes SET calories = ? WHERE id = ?');
	$prepared->bind_param("ii", $calories, $id);
	$prepared->execute();
	}
	
function get_cupcakes() {
	global $mysql;
	$prepared = $mysql->prepare('SELECT * FROM cupcakes ');
	$prepared->execute();
	return $prepared->get_result();
}
?>