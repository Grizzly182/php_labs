<?php
require_once 'QuackBehavior.php';
require_once 'FlyBehavior.php';
abstract class Duck
{
    private QuackBehavior $quackBehavior;
    private FlyBehavior $flyBehavior;

    public function __construct(FlyBehavior $fly, QuackBehavior $quack)
    {
        $this->quackBehavior = $quack;
        $this->flyBehavior = $fly;
    }
    public abstract function display(): void;
    public function swim(): void
    {
        echo 'Плавает.' . PHP_EOL;
    }
    public function performFly(): void
    {
        $this->flyBehavior->fly();
    }
    public function performQuack(): void
    {
        $this->quackBehavior->quack();
    }

}