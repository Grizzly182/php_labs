<?php
require_once('Renderable.php');
class File implements Renderable
{
    private string $name;

    public function __construct(string $fileName)
    {
        $this->name = $fileName;
    }

    public function render(): string
    {
        return $this->name;
    }
}
