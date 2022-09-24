<?php
  function calculator(string $str) : string{
    $operations = array(5);

    $count = 0;
    for($i = 0; $i < strlen($str); $i++){
      if($str[$i] == '+' || $str[$i] == '-'){
        $operations[$count] = $str[$i];
        $count++;
      }
    }
    return '0';
  }
  calculator("3+3+5-1+4");
?>