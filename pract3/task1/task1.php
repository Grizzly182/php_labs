<?php
require_once('Customer.php');
require_once('Address.php');
$customers = [
    new Customer(
        'Белоусов',
        'Михаил',
        'Анатольевич',
        new Address('Йошкар-Ола', 'Пушкина', 27),
        '4276128390047420',
        '012345678901'
    ),
    new Customer(
        'Поликарпов',
        'Владимир',
        'Владимирович',
        new Address('Юрино', 'Центральная', 131),
        '8902445710051111',
        '553021458912'
    ),
    new Customer(
        'Заманов',
        'Данил',
        'Романович',
        new Address('Козьмодемьянск', 'Центральная', 135),
        '8902445742129055',
        '553021411149'
    ),
    new Customer(
        'Белоусов',
        'Александр',
        'Анатольевич',
        new Address('Йошкар-Ола', 'Кремлевская', 54),
        '4276128355621890',
        '012345622341'
    )
];

function compareSurnames(Customer $first, Customer $second): int
{
    $firstSurname = mb_substr($first->getSurname(), 0, 1);
    $secondSurname = mb_substr($second->getSurname(), 0, 1);
    if ($firstSurname === $secondSurname) {
        return 0;
    }
    return ($firstSurname > $secondSurname) ? -1 : 1;
}

function sortCustomersByAlphabet(array $customers): array
{
    $sortOrder = "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя";
    $sortedArray = [];
    
    $offset = 0;
    for ($i = 0; $i < strlen($sortOrder); $i++) {
        for ($j = 0 + $offset; $j < count($customers); $j++) {
            $surname = '';
            if ($customers[$j] != null) {
                $surname = mb_substr($customers[$j]->getSurname(), 0, 1);
                $sortLetter = mb_substr($sortOrder, $i, 1);
                echo $sortLetter . PHP_EOL; //Debug
                if ($sortLetter === $surname) {
                    echo 'Added' . 'offset =' . $offset . PHP_EOL . 'j= ' . $j . PHP_EOL; //Debug
                    $sortedArray[] = $customers[$j];
                    $offset++;
                }
            }
        }
    }
    return $sortedArray;
}

$sortedArray = sortCustomersByAlphabet($customers);
foreach ($sortedArray as $customer) {
    echo $customer->getSurname() . PHP_EOL;
}