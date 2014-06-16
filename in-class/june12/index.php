<?php

include("classes.php");

$page_tester = new Tester();
$page_tester->test(2, 2);
//$page_tester->test(1, 2);
$page_tester->test($page_tester->passed, 1);


$calc = new Calculator();
$page_tester->test($calc->currentTotal, 0);
$calc->clear();
$page_tester->test($calc->currentTotal, 0);

$calc->add(5);
$page_tester->test($calc->currentTotal, 5);
$calc->sub(3);
$page_tester->test($calc->currentTotal, 2);

?>

<p>Tests passed: <?= $page_tester->passed ?>
<p>Tests failed: <?= $page_tester->failed ?>
