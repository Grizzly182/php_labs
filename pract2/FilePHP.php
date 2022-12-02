<?php
require_once('Renderable.php');
class FilePHP implements Renderable
{
    private string $name;

    public function __construct(string $fileName)
    {
        $this->name = $fileName;
    }

    public function render(): void
    {
        echo $this->name . PHP_EOL;
    }
}
