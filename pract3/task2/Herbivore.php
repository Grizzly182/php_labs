<?php
require_once('Animal.php');
class Herbivore extends Animal
{
    protected $foodAmount = 1;
    public function getFoodAmountAndType() : string
    {
        return "Животное травоядное." . PHP_EOL . "Для пропитания необходимо " . $this->foodAmount . " растительной пищи." . PHP_EOL;
    }
}