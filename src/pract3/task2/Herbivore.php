<?php
require_once('Animal.php');
class Herbivore extends Animal
{
    private const FOOD_AMOUNT = 2;
    public function getFoodAmountAndType() : string
    {
        return "Животное травоядное." . PHP_EOL . "Для пропитания необходимо " . self::FOOD_AMOUNT . " растительной пищи." . PHP_EOL;
    }
}
