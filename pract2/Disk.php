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
        foreach($directories as $directory){
            $this->files += $directory->getFiles();
        }
    }

    public function render(): string
    {
        $outString = '';
        foreach($this->directories as $directory){
            $outString += $directory->render();
        }
        return $this->name . PHP_EOL . $outString . PHP_EOL;
    }
}
