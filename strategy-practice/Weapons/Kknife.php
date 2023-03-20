<?php
require_once __DIR__ . "/../IAttackable.php";
class Knife implements IAttackable
{

    public function attack(): void
    {
        echo 'Attacking with knife' . PHP_EOL;
    }
}