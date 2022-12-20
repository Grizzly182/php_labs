<?php
require_once __DIR__ . '/../vendor/mikhail/pizza_store/vendor/autoload.php';
use Mikhail\Repo\PizzaStore;
use Mikhail\Repo\Pizza;

class DaMichelePizzaStore extends PizzaStore
{
    public function __construct()
    {
        $this->name = 'До До';
    }
    public function createPizza(Pizza $pizzaType): Pizza
    {
        $type = get_class($pizzaType);
        if ($type !== 'HawaiiPizza' || $type !== 'PineapplePizza') {
            throw new InvalidArgumentException('There is no such pizza in our menu.');
        }
        return $pizzaType;
    }
}