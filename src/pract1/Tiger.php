<?php
require_once('Animal.php');
class Tiger extends Animal
{
    public function getHowEat(): int
    {
        return 3;
    }
}
