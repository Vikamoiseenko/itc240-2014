<?php

function clean($value) {
return htmlentities($value);
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

function get_sochi() {
global $mysql;
$prepare = $mysql->prepare('select * from Figure_skating');
$prepare->execute();
return $prepare->get_result();
}

function get_athlete() {
global $mysql;
global $athlete;
$prepare = $mysql->prepare('select * from Figure_skating');
$prepare->execute();
return $prepare->get_result();
}
function get_events() {
global $mysql;
global $events;
$prepare = $mysql->prepare('select * from Figure_skating order by events DESC;');
$prepare->execute();
return $prepare->get_result();
}
function get_country() {
global $mysql;
global $country;
$prepare = $mysql->prepare('select * from Figure_skating Where MEDAL = "Gold" order by Country DESC ;');
$prepare->execute();
return $prepare->get_result();
}