<?php

require_once 'characters/elf.php';
require_once 'characters/demon.php';

require_once 'Weapons/knife.php';
require_once 'Weapons/axe.php';
require_once 'Weapons/hammer.php';

$elf = new Elf('Radagon', 100);

$elf->show();

$elf->attack();

$elf->swapWeapon(new Hammer());

$elf->attack();

$elf->swapWeapon(new Axe());

echo PHP_EOL . PHP_EOL;

$demon = new Demon('Baal', 150);

$demon->show();

$demon->attack();

$demon->swapWeapon(new Axe());

$demon->attack();

$demon->swapWeapon(new Hammer());