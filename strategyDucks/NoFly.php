<?php
require_once 'FlyBehavior.php';

class NoFly implements FlyBehavior
{
    public function fly(): void
    {
        echo 'Не летает.' . PHP_EOL;
    }
}