<?php
  class Animal{
    private string $name;
    private bool $hungry = true;
    private bool $angry = false;

    public function __constructor(string $name){
      $this->name = $name;
    }

    public function isHungry() : bool{
      return $this->hungry;
    }

    public function isAngry() : bool{
      return $this->angry;
    }

    public function getName() : string{
      return $this->name;
    }

    public function getHowEat() : int{
      return 1;
    }

    public function eat(int $countFood) : void{
      if($countFood < $this->getHowEat()){
        $this->angry = $this->hungry = true;
      }
      else{
        $this->angry = $this->hungry = false;
      }
    }
  }
?>