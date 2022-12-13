<?php
require_once 'OSComponent.php';

class PHPDirectory extends OSComponent
{
    /**
     * @var array<OSComponent> $components
     */
    private array $components = [];

    public function display(): void
    {
        echo '' . $this->name . PHP_EOL;
        foreach($this->components as $component){
            print($component->display());
        }
    }

    public function count(): int
    {
        $sum = 1;
        foreach($this->components as $component){
            $sum += $component->count();
        }
        return $sum;
    }

    public function add(OSComponent $component): void
    {
        if(get_class($component) === 'Disk'){
            throw new InvalidArgumentException('Directory cannot have Disk in it');
        }
        $this->components[] = $component;
    }
}