<?php
require_once('Renderable.php');
class Directory implements Renderable
{

    private string $name;
    private $files = [];

    public function __construct(string $name, File $files)
    {
        $this->name = $name;
        $this->files = $files;
    }

    public function render(): string
    {
        return $this->name . PHP_EOL . var_dump($this->files);
    }
}
