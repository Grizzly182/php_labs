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

    public function sum(float $number) : self
    {
        $this->result += $number;
        return $this;
    }

    public function minus(float $number) : self
    {
        $this->result -= $number;
        return $this;
    }

    public function product(float $number) : self
    {
        $this->result *= $number;
        return $this;
    }

    public function division(float $number) : self
    {
        $number !== 0.0 ? $this->result /= $number : $this->result = 0;
        return $this;
    }

    public function exp(float $exp) :self{
        $this->result = pow($this->result, $exp);
        return $this;
    }

    public function getResult() : float
    {
        return $this->result;
    }
}
