<?php
require_once 'QuackBehavior.php';

class QuackClass implements QuackBehavior
{
    public function quack(): void
    {
        echo 'Крякает.' . PHP_EOL;
    }
}