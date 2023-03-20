<?php
require_once __DIR__ . "/../IAttackable.php";
class Hammer implements IAttackable
{

    public function attack(): void
    {
        echo 'Attacking with hammer' . PHP_EOL;
    }
}