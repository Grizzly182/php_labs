<?php
require_once("Zoo.php");

$zoo = new Zoo();

echo $zoo->welcome();
echo 'Нужно еды чтобы прокормить всех животных:' . $zoo->getCountFood() . PHP_EOL;
$zoo->feedAnimals();
$zoo->stock->addFood(40);
$zoo->feedAnimals();

$zoo->showAnimals();

$angryAnimals = $zoo->getAngryAnimals();
if (!empty($angryAnimals)) {
    foreach ($angryAnimals as $animal) {
        echo $animal->getName() . PHP_EOL;
    }
}
else{
    echo 'Злых животных нет.' . PHP_EOL;
}

echo 'Количество голодных животных: ' . $zoo->getCountHungryAnimals();