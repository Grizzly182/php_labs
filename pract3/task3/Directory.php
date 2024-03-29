<?php
require_once 'OSComponent.php';
require_once 'File.php';

class PHPDirectory extends OSComponent
{
    /**
     * @var array<OSComponent> $components
     */
    private array $components = [];

    public function display(): void
    {
        echo '' . $this->name . PHP_EOL;
        foreach ($this->components as $component) {
            $component->display();
        }
    }

    /** @return array<OSComponent> */
    public function getComponents(): array
    {
        return $this->components;
    }
    /** @return array<string> $types */
    public function getComponentsTypes(): array
    {
        $types = [];
        foreach ($this->components as $component) {
            $type = $component->getType();
            if ($type === 'File') {
                $types[] = $type;
            } else {
                $types[] = 'PHPDirectory';
                /** @var array<string> $types 
                 * @var PHPDirectory $component
                */
                $types += $component->getComponentsTypes();
            }
        }
        return $types;
    }

    public function count(): int
    {
        $sum = 1;
        foreach ($this->components as $component) {
            $sum += $component->count();
        }
        return $sum;
    }

    public function add(OSComponent $component): void
    {
        if (get_class($component) === 'Disk') {
            throw new InvalidArgumentException('Directory cannot have Disk in it');
        }
        $this->components[] = $component;
    }
}