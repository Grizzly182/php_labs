<?php
require_once('Animal.php');
class Predator extends Animal
{
    private const FOOD_AMOUNT = 4;
    public function getFoodAmountAndType(): string
    {
        return "Животное хищное." . PHP_EOL . "Для пропитания необходимо " . self::FOOD_AMOUNT . " мяса." . PHP_EOL;
    }
}
