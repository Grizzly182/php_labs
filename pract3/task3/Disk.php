<?php
require_once 'OSComponent.php';

class Disk extends OSComponent
{
    /**
     * @var array<OSComponent> $components
     */
    private array $components = [];

    public function display(): void
    {
        echo $this->name . PHP_EOL;
        foreach ($this->components as $component) {
            $component->display();
        }
    }

    public function displayNumberOfFilesAndDirectories(): void
    {
        $filesAmount = 0;
        $directoriesAmount = 0;
        $tempDirectoryFiles = [];
        $finalComponents = [];
        foreach ($this->components as $component) {
            $type = $component->getType();
            if ($type === 'PHPDirectory') {
                $directoriesAmount++;
                /** @var PHPDirectory $component */
                $tempDirectoryFiles += $component->getComponents();
            } else {
                $filesAmount++;
            }

            if (count($tempDirectoryFiles) !== 0) {
                foreach ($tempDirectoryFiles as $component) {
                    if ($component->getType() === 'File') {
                        $filesAmount++;
                    } else if ($component->getType() === 'PHPDirectory') {
                        /** @var PHPDirectory $component */
                        $finalComponents = $component->getComponentsTypes();
                    }
                }
            }
        }
        foreach ($finalComponents as $component) {
            if ($component === 'File') {
                $filesAmount++;
            } else
                $directoriesAmount++;
        }
        echo "Диск $this->name" . PHP_EOL . "$filesAmount Файл(-ов)" . PHP_EOL . "$directoriesAmount Папки(-ок)" . PHP_EOL;
    }

    public function count(): int
    {
        $sum = 0;
        foreach ($this->components as $component) {
            $sum += $component->count();
        }
        return $sum;
    }

    public function add(OSComponent $component): void
    {
        if (get_class($component) === 'Disk') {
            throw new InvalidArgumentException('Disk cannot have another Disk in it');
        }
        $this->components[] = $component;
    }

}