<?php
abstract class Animal
{
    protected int $foodAmount = 0;
    abstract public function getFoodAmountAndType() : string;
}
