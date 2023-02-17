<?php
require_once 'QuackBehavior.php';

class Squeak implements QuackBehavior
{
    public function quack(): void
    {
        echo 'Пищит.' . PHP_EOL;
    }
}