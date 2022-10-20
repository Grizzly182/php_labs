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
        'Белоусов',
        'Александр',
        'Анатольевич',
        new Address('Йошкар-Ола', 'Кремлевская', 54),
        '4276128355621890',
        '012345622341'
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
        new Address('Юрино', 'Центральная', 135),
        '8902445742129055',
        '553021411149'
    )
];

function sortCustomersByAlphabet(array $customers): void
{
    for($i = 0; $i <= count($customers); $i++){
        if($customers[$i]->getSurname()[0] > $customers[$i + 1]->getSurname()[0]){
            $temp = $customers[$i];
            $customers[$i] = $customers[$i + 1];
            $customers[$i + 1] = $temp;
        }
    }
}

sortCustomersByAlphabet($customers);
var_dump($customers);
