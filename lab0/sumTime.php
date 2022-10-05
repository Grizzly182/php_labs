<?php
//Работу выполнил студент группы П-31
//Белоусов Михаил
function sumTime(string $first, string $second): string
{
    $firstTime = explode(':', $first);
    $secondTime = explode(':', $second);
    $sumTime = [];

    if (!isValidInput($first) || !isValidInput($second) || count($firstTime) !== 3 || count($secondTime) !== 3) {
        return 'Ошибка ввода!';
    }

    $validChars = ' 0123456789:';
    for ($i = 0; $i < strlen($first); $i++) {
        if (!strpos($validChars, $first[$i])) {
            return 'Ошибка ввода';
        }
    }
    for ($i = 0; $i < strlen($second); $i++) {
        if (!strpos($validChars, $second[$i])) {
            return 'Ошибка ввода';
        }
    }

    $sumTime = $firstTime;

    //Секудны
    if ($sumTime[2] + $secondTime[2] >= 60) {
        $temp = 60 - $sumTime[2];
        $sumTime[2] = $secondTime[2] - $temp;
        $sumTime[1]++;
    } else {
        $sumTime[2] += $secondTime[2];
    }

    //Минуты
    if ($sumTime[1] + $secondTime[1] >= 60) {
        $temp = 60 - $sumTime[1];
        $sumTime[1] = $secondTime[1] - $temp;
        $sumTime[0]++;
    } else {
        $sumTime[1] += $secondTime[1];
    }

    //Часы
    if ($sumTime[0] + $secondTime[0] >= 24) {
        $temp = 24 - $sumTime[0];
        $sumTime[0] = $secondTime[0] - $temp;
    } else {
        $sumTime[0] += $secondTime[0];
    }

    return $sumTime[0] . ':' . $sumTime[1] . ':' . $sumTime[2];
}

function isValidInput(string $time): bool
{
    return ($time[0] >= 24 || $time[0] < 0 || $time[1] > 59 || $time[1] < 0 || $time[2] > 59 || $time[2] < 0) ? false : true;
}

if ($argv[1] !== null && $argv[2] !== null) {
    echo sumTime($argv[1], $argv[2]);
}
