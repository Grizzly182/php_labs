<?php
require_once 'File.php';
require_once 'Directory.php';
require_once 'Disk.php';

/**
 * @var array<Disk> $arr
 */
function sortDisks(array $arr): array
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr) - 1; $j++) {
            $first = $arr[$j]->count();
            $second = $arr[$j + 1]->count();
            if ($first < $second) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

//  ДИСК С
$CDisk = new Disk('C:\\');
for ($i = 0; $i < 23; $i++) {
    $dir = new PHPDirectory('dir');
    for ($k = 0; $k < 3; $k++) {
        $dir->add(new File('file'));
    }
    $CDisk->add($dir);
}

echo 'C: ' . $CDisk->count(); // Вывод общего кол-ва элементов на диске
$CDisk->displayNumberOfFilesAndDirectories(); // Вывод Всего диска

echo PHP_EOL;

//  ДИСК D
$DDisk = new Disk('D:\\');
for ($i = 0; $i < 4; $i++) {
    $dir = new PHPDirectory('dir');
    for ($k = 0; $k < 3; $k++) {
        $dir->add(new File('file'));
    }
    $DDisk->add($dir);
}

echo 'D: ' . $DDisk->count(); // Вывод общего кол-ва элементов на диске
$DDisk->displayNumberOfFilesAndDirectories(); // Вывод Всего диска

echo PHP_EOL;

//  ДИСК E
$EDisk = new Disk('E:\\');
for ($i = 0; $i < 12; $i++) {
    $dir = new PHPDirectory('dir');
    for ($k = 0; $k < 3; $k++) {
        $dir->add(new File('file'));
    }
    $EDisk->add($dir);
}

echo 'E: ' . $EDisk->count(); // Вывод общего кол-ва элементов на диске
$EDisk->displayNumberOfFilesAndDirectories(); // Вывод Всего диска

echo PHP_EOL;

//  ДИСК A
$ADisk = new Disk('A:\\');
for ($i = 0; $i < 5; $i++) {
    $dir = new PHPDirectory('dir');
    for ($k = 0; $k < 4; $k++) {
        $dir->add(new File('file'));
    }
    $ADisk->add($dir);
}

echo 'A: ' . $ADisk->count(); // Вывод общего кол-ва элементов на диске
$ADisk->displayNumberOfFilesAndDirectories(); // Вывод Всего диска

echo PHP_EOL;

$disks = [$CDisk, $DDisk, $EDisk, $ADisk];

//  СОРТИРОВКА
echo 'Изначальный массив:' . PHP_EOL;
for ($i = 0; $i < count($disks); $i++) {
    echo $i + 1 . ") Диск " . $disks[$i]->getName() . '  Размер: ' . $disks[$i]->count() . PHP_EOL;
}

$disks = sortDisks($disks);

echo 'Отсортированный массив:' . PHP_EOL;
for ($i = 0; $i <= count($disks) - 1; $i++) {
    echo $i + 1 . ") Диск " . $disks[$i]->getName() . '  Размер: ' . $disks[$i]->count() . PHP_EOL;
}