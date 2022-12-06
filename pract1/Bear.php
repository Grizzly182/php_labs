<?php
require_once('Animal.php');
class Bear extends Animal
{
    public function getHowEat(): int
    {
        return 4;
    }
}
