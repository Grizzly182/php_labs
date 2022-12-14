<?php

abstract class OSComponent
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $newName) : void
    {
        $this->name = $newName;
    }
    public function getType(): string
    {
        return get_class($this);
    }

    public abstract function display(): void;
    public abstract function add(OSComponent $component): void;
    public abstract function count(): int;
}