<?php
  function calculator(string $str) : string{
    $operations = array(10);
    $numbers = array(10);
    $operationsCount = 0;
    $numbersCount = 0;
    $firstin = null;
    $lastin = null;
    for($i = 0; $i < strlen($str); $i++){
      if($str[$i] == '+' || $str[$i] == '-'){
        $operations[$operationsCount] = $str[$i];
        $operationsCount++;
      }
    }
    preg_match_all('!\d+!', $str, $numbers);
    var_dump($numbers);
    $result = 0;
    $i = $j = 0;
    while($i < count($numbers)){
        $number = $numbers[$i];
        $operator = $operations[$j];
        if($operator == '+'){
          $result += (int) $number;
        }
        elseif($operator = '-'){
          $result -= (int) $number;
        }
        $i++;
        $j++;
        echo $result;
        echo "\n", $i, $j , "\n";
      }
    return (int)$result;
  }
  echo calculator("1+2321+2+4+2-12");
?>