<?php
require_once 'OSComponent.php';

class Disk extends OSComponent
{
    /**
     * @var array<OSComponent> $components
     */
    private array $components = [];

    public function display(): void
    {
        echo $this->name . PHP_EOL;
        foreach($this->components as $component){
            echo "\t" . $component->display();
        }
    }

    public function displayWholeDisk() : void{

    }

    public function count(): int
    {
        $sum = 0;
        foreach($this->components as $component){
            $sum += $component->count();
        }
        return $sum;
    }

    public function add(OSComponent $component): void
    {
        if(get_class($component) === 'Disk'){
            throw new InvalidArgumentException('Disk cannot have another Disk in it');
        }
        $this->components[] = $component;
    }
}