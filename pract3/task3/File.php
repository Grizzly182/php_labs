<?php
require_once('NotImplementedException.php');
require_once 'OSComponent.php';

class File extends OSComponent
{
    public function display(): void
    {
        echo $this->name . PHP_EOL;
    }

    public function count(): int
    {
        return 1;
    }

    public function add(OSComponent $component): void
    {
        throw new NotImplementedException('File can\'t contain another elements!');
    }
}
