<?php
require_once 'Renderable.php';
class aDirectory implements Renderable
{

    private string $name;
    /**
     * @var array<Renderable> $components
     */
    private array $components = [];

    public function __construct(string $name, array $files)
    {
        $this->name = $name;
        $this->components = $files;
    }

    public function render(): void
    {
        echo "Название директории: {$this->name}" . PHP_EOL;
        foreach ($this->components as $component) {
            $component->render();
        }
    }
}
