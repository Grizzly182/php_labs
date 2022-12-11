<?php
require_once('Animal.php');
class Omnivore extends Animal
{
    protected $foodAmount = 3;
    public function getFoodAmountAndType(): string
    {
        return "Животное всеядное." . PHP_EOL . "Для пропитания необходимо " . $this->foodAmount . " любой еды." . PHP_EOL;
    }
}
