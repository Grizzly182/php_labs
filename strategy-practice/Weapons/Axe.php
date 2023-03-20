<?php
require_once __DIR__ . "/../IAttackable.php";
class Axe implements IAttackable
{

    public function attack(): void
    {
        echo 'Attacking with axe' . PHP_EOL;
    }
}