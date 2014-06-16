<?php

class Bus {
	public $speed = 20;
	public $armed = false;
	public $exploded = false;

function getArmed() {
	return $this->armed;	
}

function getExploded() {
	return $this->exploded;
}

function getSpeed() {
	return $this->speed;
}

function setSpeed($speed) {
$this->speed = $speed;
	if ($speed >=50) {
	$this->armed = true;
	} else {
	$this->armed = false;
}
}

function setExploded($speed) {
	if ($speed <50) {
	$this->exploded = true;
	} else {
	$this->exploded = false;
}
}

function trigger() {
	$this->exploded = true;
	}
function reset() {
$this->exploded = false;
}
	}

?>