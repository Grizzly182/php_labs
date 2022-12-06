<?php
// Работу выполнил студент группы П-31
// Белоусов Михаил
require('Calculator.php');
$calculator = new Calculator();
echo $calculator->sum(4)->minus(1)->product(42)->division(0.3)->getResult() . PHP_EOL; // 420
echo $calculator->sum(3)->sum(3)->minus(3)->division(3)->getResult() . PHP_EOL; // 1
echo $calculator->sum(1.4)->sum(2.6)->product(4)->getResult() . PHP_EOL; // 16
echo $calculator->sum(1)->sum(2)->product(3)->division(0)->getResult(); // 0
