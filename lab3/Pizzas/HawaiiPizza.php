<?php
require_once __DIR__ . '/../vendor/mikhail/pizza_store/vendor/autoload.php';
use Mikhail\Repo\Pizza;

class HawaiiPizza extends Pizza
{
    /**
     * @param array<string> $toppings
     */
    public function __construct(string $sauce, array $toppings)
    {
        $this->name = 'Гавайская';
        $this->sauce = $sauce;
        $this->toppings = $toppings;
    }
}