<?php
function isValidInput(string $time) : bool{
  return ($time[0] >= 24 || $time[0] < 0 || $time[1] > 59 || $time[1] < 0 || $time[2] > 59 || $time[2] < 0) ? false : true;
}

function sumTime(string $first, string $second) : string{
  $firstTime = explode(':', $first);
  $secondTime = explode(':', $second);
  $sumTime = array();

  if(!isValidInput($first) || !isValidInput($second)){
    return 'Ошибка ввода!';
  }

  $validChars = ' 0123456789:';
  for($i = 0; $i < strlen($first); $i++){
    if(!strpos($validChars, $first[$i])){
      return 'Ошибка ввода';
    }
  }
  for($i = 0; $i < strlen($second); $i++){
    if(!strpos($validChars, $second[$i])){
      return 'Ошибка ввода';
    }
  }

  $sumTime = $firstTime;
  var_dump($sumTime);
  return $sumTime[0];
}
echo sumTime('22:59:59', '19:04:22');