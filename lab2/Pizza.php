<?php
namespace Mikhail\Repo;

abstract class Pizza{
    private string $name;
    private string $sauce;

    /**
     * @var array<string> $toppings
     */
    private array $toppings = [];

    
    public function __construct(string $name, string $sauce, string $toppings)
    {
        $this->name = $name;
        $this->sauce = $sauce;
        $this->toppings = $toppings;
    }

    public function prepare() : void{
        $toppingsString = '';
        foreach($this->toppings as $topping){
            $toppingsString += "$topping\n";
        }
        print("Началась готовка пиццы {$this->name}");
        print("Добавлен соус {$this->sauce}");
        print("Добавлены топики:\n {$toppingsString}");
    }
}