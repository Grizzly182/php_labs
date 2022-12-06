<?php
require_once 'C:php_labs/src/lab1/Calculator.php';
require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class CalculatorTests extends TestCase{
    private $calculator;

    protected function SetUp() : void{
        $this->calculator = new Calculator();
    }

    //Plus
    public function testPlus(){
        $this->assertEquals($this->calculator->sum(10.0)->getResult(), 10);
    }
    //Minus
    public function testMinus(){
        $this->assertEquals($this->calculator->minus(10)->getResult(), -10);
    }
    //Product
    public function testProduct(){
        $this->assertEquals($this->calculator->sum(30)->product(1.5)->getResult(), 45);
    }
    //Division
    public function testDivision(){
        $this->assertEquals($this->calculator->sum(1)->division(10)->getResult(), 0.1);
    }
    //Division by zero
    public function testDivisionByZero(){
        $this->assertEquals($this->calculator->division(0)->getResult(), 0);
    }
    //Exponential
    public function testExp(){
        $this->assertEquals($this->calculator->exp(10.2)->getResult(), 0);
    }
    //Exponential massive numbers
    public function testExpLarge(){
        $this->assertEquals($this->calculator->sum(2)->exp(15)->getResult(), 32768);
    }
    //Exponential zero
    public function testExpZero(){
        $this->assertEquals($this->calculator->sum(2)->exp(0)->getResult(), 1);
    }
}