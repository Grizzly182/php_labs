<?php
///Работу выполнил студент группы П-31
/// Белоусов Михаил
  function calculator(string $str) : string{
    $operations = array(10);
    $numbers = array(10);
    $operationsCount = 0;

    for($i = 0; $i < strlen($str); $i++){
      if($str[$i] == '+' || $str[$i] == '-'){
        $operations[$operationsCount] = $str[$i];
        $operationsCount++;
      }
    }
    if(count($operations) > 4 ){
      return 'Ошибка ввода';
    }
    $correctInput = '0123456789+-';
    for($i = 0; $i < strlen($str); $i++){
      if(!strpos($correctInput, $str[$i])){
        return 'Ошибка ввода';
      }
    }

    $numbers = explode('+', $str);
    $numberOfOperations = 0;
    $temp = '';
    $sum = 0;
    foreach($numbers as $num){
      $minusPos = strpos($num, '-');
      if($minusPos){
        $numbersWithMinus = explode('-', $num);
        foreach($numbersWithMinus as $keyMinus => $numMinus){
          if($keyMinus === 0){
            $temp = $numMinus;
            $numberOfOperations++;
          }
          else{
            $temp = $temp - (int)$numMinus;
            $numberOfOperations++;
          }
        }
        $sum += $temp;
      }
      else{
        $sum += $num;
        $numberOfOperations++;
      }
    }
    return $sum;
  }
  echo calculator('5+5+4+5+233');