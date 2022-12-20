<?php
require_once __DIR__ . '/../vendor/mikhail/pizza_store/vendor/autoload.php';
use Mikhail\Repo\PizzaStore;
use Mikhail\Repo\Pizza;

class DaMichelePizzaStore extends PizzaStore
{
    public function __construct()
    {
        $this->name = 'Да Микеле';
    }
    public function createPizza(Pizza $pizzaType): Pizza
    {
        $type = get_class($pizzaType);
        if ($type !== 'FourCheesePizza' && $type !== 'PepperoniPizza') {
            throw new InvalidArgumentException('There is no such pizza in our menu.');
        }
        return $pizzaType;
    }
}