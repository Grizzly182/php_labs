<?php
// Работу выполнил студент группы П-31
// Белоусов Михаил
class Calculator
{
    private float $result;

    public function sum(float $number) : Calculator
    {
        $this->result += $number;
        return $this;
    }

    public function minus(float $number) : Calculator
    {
        $this->result -= $number;
        return $this;
    }

    public function product(float $number) : Calculator
    {
        $this->result *= $number;
        return $this;
    }

    public function division(float $number) : Calculator
    {
        $number !== 0.0 ? $this->result /= $number : $this->result = 0;
        return $this;
    }

    public function getResult() : float
    {
        $tempResult = $this->result;
        $this->result = 0;
        return $tempResult;
    }
}
