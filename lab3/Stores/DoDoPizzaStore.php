<?php
require_once __DIR__ . '/../vendor/mikhail/pizza_store/vendor/autoload.php';
require_once __DIR__ . '/../Pizzas/HawaiiPizza.php';
require_once __DIR__ . '/../Pizzas/PineapplePizza.php';
use Mikhail\Repo\PizzaStore;
use Mikhail\Repo\Pizza;

class DaMichelePizzaStore extends PizzaStore
{
    public function __construct()
    {
        $this->name = 'До До';
    }
    public function createPizza(string $pizzaType): Pizza
    {
        if ($pizzaType !== 'HawaiiPizza' && $pizzaType !== 'PineapplePizza') {
            throw new InvalidArgumentException('There is no such pizza in our menu');
        }
        if ($pizzaType === 'HawaiiPizza') {
            return new HawaiiPizza();
        } else {
            return new PineapplePizza();
        }
    }
}