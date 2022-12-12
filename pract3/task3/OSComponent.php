<?php
namespace Task3;

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
    public function setName(string $newName)
    {
        $this->name = $newName;
    }

    public abstract function Display(): void;
    public abstract function Add(OSComponent $component): void;
    public abstract function Delete(): void;
    public abstract function count(): int;
}