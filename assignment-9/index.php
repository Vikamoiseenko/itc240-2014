<?php

include("bus.php");

$speedBus = new Bus();
?>
<p>Initial bus speed <?= $speedBus->getSpeed(); ?> mph</p>
<p>Armed is <?= $speedBus->getArmed(); ?></p>
<p>Exploded is <?= $speedBus->getExploded(); ?></p><br>

<?php
$speedBus->setSpeed(55);

?>
<p>Bus increase the speed to <?= $speedBus->getSpeed(); ?> mph </p>
<p> Armed is <?= $speedBus->getArmed(); ?></p><br>

<?php
$speedBus->setSpeed(80);
$speedBus->setExploded(55);
$speedBus->getExploded(55);
?>
<p>Bus increase the speed to <?= $speedBus->getSpeed(); ?> mph </p>
<p> Armed is <?= $speedBus->getArmed(); ?></p>
<p> Exploded is <?= $speedBus->getExploded(); ?></p><br>

<?php
$speedBus->setSpeed(30);
$speedBus->setExploded(30);
$speedBus->getExploded(30);
?>
<p>Bus drop the speed to <?= $speedBus->getSpeed(); ?> mph </p>
<p> Armed is <?= $speedBus->getArmed(); ?></p>
<p> Exploded is <?= $speedBus->getExploded(); ?></p><br>

<?php
$speedBus->reset();
?>
<p>Exploded status is <?= $speedBus->getExploded(); ?>  </p><br>

<?php
$speedBus->trigger();
?>
<p>Exploded status is <?= $speedBus->getExploded(); ?>  </p><br>
