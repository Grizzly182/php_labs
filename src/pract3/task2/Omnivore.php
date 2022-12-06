<?php
require_once('Animal.php');
class Omnivore extends Animal
{
    private const FOOD_AMOUNT = 3;
    public function getFoodAmountAndType(): string
    {
        return "Животное всеядное." . PHP_EOL . "Для пропитания необходимо " . self::FOOD_AMOUNT . " любой еды." . PHP_EOL;
    }
}
