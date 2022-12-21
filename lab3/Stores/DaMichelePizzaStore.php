<?php
require_once __DIR__ . '/../vendor/mikhail/pizza_store/vendor/autoload.php';
require_once __DIR__ . '/../Pizzas/FourCheesePizza.php';
require_once __DIR__ . '/../Pizzas/PepperoniPizza.php';
use Mikhail\Repo\PizzaStore;
use Mikhail\Repo\Pizza;

class DaMichelePizzaStore extends PizzaStore
{
    public function __construct()
    {
        $this->name = 'Да Микеле';
    }
    public function createPizza(string $pizzaType): Pizza
    {
        if ($pizzaType !== 'FourCheesePizza' && $pizzaType !== 'PepperoniPizza') {
            throw new InvalidArgumentException('There is no such pizza in our menu');
        }
        if ($pizzaType === 'FourCheesePizza') {
            return new FourCheesePizza();
        } else {
            return new PepperoniPizza();
        }
    }
}