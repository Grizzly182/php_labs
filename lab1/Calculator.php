<?php
// Работу выполнил студент группы П-31
// Белоусов Михаил
class Calculator
{
    private float $result;

    public function __construct()
    {
        $this->result = 0;
    }

    public function sum(float $number)
    {
        $this->result += $number;
        return $this;
    }

    public function minus(float $number)
    {
        $this->result -= $number;
        return $this;
    }

    public function product(float $number)
    {
        $this->result *= $number;
        return $this;
    }

    public function division(float $number)
    {
        $number !== 0.0 ? $this->result /= $number : $this->result = 0;
        return $this;
    }

    public function getResult()
    {
        $tempResult = $this->result;
        $this->result = 0;
        return $tempResult;
    }
}
