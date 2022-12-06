<?php
require_once('Animal.php');
require_once('Stock.php');
require_once('Bear.php');
require_once('Tiger.php');
require_once('Monkey.php');
class Zoo
{
    public $animals;
    public $stock;

    public function __construct()
    {
        $this->animals = [
            new Bear('Billy'), new Bear('Van'), new Monkey('Wee-Wee'), new Tiger('Alexandr'),
            new Monkey('Porkchop'), new Monkey('Ronaldo'), new Tiger('Full Master')
        ];
        $this->stock = new Stock();
    }
    
    public static function welcome(): string
    {
        return 'Добро пожаловать в зоопарк!' . PHP_EOL . PHP_EOL;
    }

    public function feedAnimals(): void
    {
        $needToFeed = $this->getCountFood();
        if ($needToFeed <= $this->stock->getCountFood()) {
            foreach ($this->animals as $animal) {
                $food = $animal->getHowEat();
                $animal->eat($food);
                $this->stock->removeFood($food);
            }
            echo 'Все животные сыты.' . PHP_EOL . 'Еды осталось на складе: ' . $this->stock->getCountFood() . PHP_EOL;
        } else {
            echo 'Еды на складе не хватит, нужен привоз' . PHP_EOL;
        }
    }

    public function showAnimals(): void
    {
        foreach ($this->animals as $animal) {
            echo $animal->getName() . ' - ' . $this->getType($animal) . PHP_EOL;
        }
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
        $angryAnimals = [];
        foreach ($this->animals as $animal) {
            if ($animal->isAngry()) {
                $angryAnimals[] = $animal;
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
        $hungryAnimals = [];
        foreach ($this->animals as $animal) {
            if ($animal->isHungry()) {
                $hungryAnimals[] = $animal;
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

    public function getCountHungryAnimals(): int
    {
        $hungryAnimals = $this->getHungryAnimals();
        $count = 0;
        foreach ($hungryAnimals as $animal) {
            $count += $animal->getHowEat();
        }
        return $count;
    }

    private function getType(Animal $animal): string
    {
        return get_class($animal);
    }
}
