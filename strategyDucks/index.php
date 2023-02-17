<?php
require_once('FlyWithWings.php');
require_once('Quack.php');
require_once('Squeak.php');
require_once('RedDuck.php');

$duck = new RedDuck(new FlyWithWings(), new Squeak());

$duck->display();
$duck->swim();
$duck->performFly();
$duck->performQuack();