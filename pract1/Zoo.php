<?php
require('Animal.php');
include_once('C:\\Users\\tiger\\Desktop\\php\\pract1\\Bear.php');
include_once('C:\\Users\\tiger\\Desktop\\php\\pract1\\Tiger.php');
include_once('C:\\Users\\tiger\\Desktop\\php\\pract1\\Monkey.php');
class Zoo
{
    private $animals;
    private $stock;

    public function __construct()
    {
        $this->animals = [
            new Bear('Billy'), new Bear('Van'), new Monkey('Wee-Wee'), new Tiger('Alexandr'),
            new Monkey('Porkchop'), new Monkey('Ronaldo'), new Tiger('Full Master')
        ];
    }
    public function getCountAngry(): int
    {
        $count = 0;
        foreach ($this->animals as $animal) {
            if ($animal->isAngry()) {
                $count++;
            }
        }
        return $count;
    }

    public function getAngryAnimals(): array
    {
        $arrayCount = 0;
        $angryAnimals = [];
        foreach ($this->animals as $animal) {
            if ($animal->isAngry()) {
                $angryAnimals[$arrayCount] = $animal;
                $arrayCount++;
            }
        }
        return $angryAnimals;
    }

    public function getCountHungry(): int
    {
        $count = 0;
        foreach ($this->animals as $animal) {
            if ($animal->isHungry()) {
                $count++;
            }
        }
        return $count;
    }

    public function getHungryAnimals(): array
    {
        $arrayCount = 0;
        $hungryAnimals = [];
        foreach ($this->animals as $animal) {
            if ($animal->isHungry()) {
                $hungryAnimals[$arrayCount] = $animal;
                $arrayCount++;
            }
        }
        return $hungryAnimals;
    }

    public function getCountFood(): int
    {
        $count = 0;
        foreach ($this->animals as $animal) {
            $count += $animal->getHowEat();
        }
        return $count;
    }

    public function getCountHungryAnimals() : int{
        $hungryAnimals = $this->getHungryAnimals();
        $count = 0;
        foreach($hungryAnimals as $animal){
            $count += $animal->getHowEat();
        }
        return $count;
    }

    public function getType(Animal $animal) : string{
        return get_class($animal);
    }
}

$zoo = new Zoo();
$bear = new Bear('michael');
echo $zoo->getType($bear);