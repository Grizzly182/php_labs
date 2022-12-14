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

/** @param array<Customer> $customers 
 * @return array<Customer>
*/
function sortCustomersByAlphabet(array $customers): array
{
    $sortOrder = "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
    $sortedArray = [];
    $customersAdded = 0;
    for ($i = 0; $i < strlen($sortOrder); $i++){
        for($j = 0; $j < count($customers); $j++){
            $sortLetter = mb_substr($sortOrder, $i, 1);
            if(preg_match("/^{$sortLetter}[А-ЯA-Zа-яa-z]/i", $customers[$j]->getSurname())){
                $sortedArray[] = $customers[$j];
                $customersAdded++;
            }
        }
        if($customersAdded === count($customers)){
            break;
        }
    }
    return $sortedArray;
}

/** @param array<Customer> $customers 
 * @return array<Customer>
*/
function getCustomersByCreditCardNumber(array $customers, string $number) : array
{
    $sortedArray = [];
    if(preg_match('/[A-Za-zА-Яа-я]/', $number)){
        throw new InvalidArgumentException();
    }

    foreach($customers as $customer){
        if(preg_match("/({$number})/", $customer->getCreditCardNumber())){
            $sortedArray[] = $customer;
        }
    }
    return $sortedArray;
}

echo 'Список клиентов в алфавитном порядке:' . PHP_EOL;
$sortedArray = sortCustomersByAlphabet($customers);
foreach ($sortedArray as $customer) {
    echo $customer->showCustomer() . PHP_EOL;
}

echo PHP_EOL . PHP_EOL . PHP_EOL . 'Список клиентов с номером кредитки в одинаковом диапазоне' . PHP_EOL . PHP_EOL;
$sortedArray = getCustomersByCreditCardNumber($customers, '445');
foreach ($sortedArray as $customer) {
    echo $customer->showCustomer() . PHP_EOL;
}