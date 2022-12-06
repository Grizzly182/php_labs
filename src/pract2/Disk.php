<?php
require_once('Renderable.php');
class Disk implements Renderable
{
    private string $name;
    /**
     * @var array<Renderable> $components
     */
    private array $components = [];

    public function __construct(string $diskName, array $directories)
    {
        $this->name = $diskName;
        $this->components = $directories;
    }

    public function render(): void
    {
        echo "Название диска: {$this->name}" . PHP_EOL;
        foreach ($this->components as $component) {
            echo $component->render();
        }
    }
}
