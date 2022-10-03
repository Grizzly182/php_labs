<?php
  class Stock{
    private int $countFood = 0;

    public function getCountFood(): int{
      return $this->countFood;
    }

    public function addFood(int $countFood) : void{
      $this->countFood += $countFood;
    }

    public function removeFood(int $countFood) : void{
      $this->countFood -= $countFood;
    }
  }
?>