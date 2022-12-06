<?php
//Работу выполнил студент группы П-31
//Белоусов Михаил
function sumTime(string $first, string $second): string
{
    (int)$firstTime = explode(':', $first);
    (int)$secondTime = explode(':', $second);
    $sumTime = [];

    if (isInvalidInput($firstTime) || isInvalidInput($secondTime) || count($firstTime) !== 3 || count($secondTime) !== 3) {
        return 'Ошибка ввода!';
    }

    var_dump($firstTime);
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
    var_dump($secondTime);
    $sumTime = $firstTime;
    var_dump($sumTime);
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

function isInvalidInput($time): bool
{
    return ((int)$time[0] >= 24 || (int)$time[0] < 0) || ((int)$time[1] >= 60 || (int)$time[1] < 0) || ((int)$time[2] >= 60 || (int)$time[2] < 0) ? true : false;
}

echo sumTime('24:59:50', '10:20:30');
if ($argv[1] !== null && $argv[2] !== null) {
    echo sumTime($argv[1], $argv[2]);
}
