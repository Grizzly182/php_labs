<?php

require_once('Duck.php');

class RedDuck extends Duck
{
    public function display(): void
    {
        echo 'Это красная утка' . PHP_EOL;
    }
}