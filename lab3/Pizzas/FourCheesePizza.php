<?php
require_once __DIR__ . '/../vendor/mikhail/pizza_store/vendor/autoload.php';
use Mikhail\Repo\Pizza;

class FourCheesePizza extends Pizza
{
    /**
     * @param array<string> $toppings
     */
    public function __construct(string $sauce = '-', array $toppings = null)
    {
        $this->name = 'Четыре сыра';
        $this->sauce = $sauce;
        $this->toppings = $toppings;
    }
}
