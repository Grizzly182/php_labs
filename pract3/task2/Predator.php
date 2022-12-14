<?php
require_once('Animal.php');
class Predator extends Animal
{
    protected int $foodAmount = 4;
    public function getFoodAmountAndType(): string
    {
        return "Животное хищное." . PHP_EOL . "Для пропитания необходимо " . $this->foodAmount . " мяса." . PHP_EOL;
    }
}
