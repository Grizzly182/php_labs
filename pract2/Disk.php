<?php
require_once('Renderable.php');
class Disk implements Renderable
{
    private string $name;
    private $directories = [];
    private $files = [];

    public function __construct(string $diskName, array $directories)
    {
        $this->name = $diskName;
        $this->directories = $directories;
    }

    public function render(): string
    {
        return $this->name . PHP_EOL . var_dump($this->directories) . PHP_EOL . var_dump($this->files) . PHP_EOL;
    }
}
