<?php
/*
Accessing property operators:
Array - [] - ex. $array["prop"];
Array =def or loop - => - ex. foreach($array as $key=> $value) or ["key" => "value"]
Object - -> ex. $obj->prop;
*/
class Tester {
	public $passed = 0;
	public $failed = 0;
	
	//test takes two arguments
	//if the're equal, the test passed
	//in that case, $this->passed +=1
	//otherwise failed, etc
	//return whether it passed
	function test($a, $b) {
	if ($a == $b) {
	$this->passed = $this->passed +1;
	return true;
	} else {
	echo "FAIL: expected $a, got $b <br>";
	$this->failed = $this->failed +1;
	}	
	}
}

class Calculator {
	public $currentTotal = 0;
	
	function clear() {
	$this->currentTotal = 0;
	}
	function add($x) {
	$this->currentTotal = $this->currentTotal + $x;
	}
	function sub($x) {
	$this->currentTotal = $this->currentTotal - $x;
	}
}