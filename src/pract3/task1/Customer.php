<?php
require_once('Address.php');
class Customer
{
    private string $surname;
    private string $name;
    private string $patronymic;
    private Address $address;
    private string $creditCardNumber;
    private string $bankAccountNumber;

    //TODO: Проверки ввода
    public function __construct(
        string $surname,
        string $name,
        string $patronymic,
        Address $address,
        string $creditCardNumber,
        string $bankAccountNumber
    ) {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->address = $address;
        $this->creditCardNumber = $creditCardNumber;
        $this->bankAccountNumber = $bankAccountNumber;
    }

    public function showCustomer(): string
    {
        $SNP = $this->surname . ' ' . $this->name . ' ' . $this->patronymic;

        return 'ФИО: ' . $SNP . PHP_EOL . 'Адрес: ' . $this->address->getAddress() . PHP_EOL .
            'Номер кредитной карты: ' . $this->creditCardNumber . PHP_EOL . 'Номер банковского счета: ' . $this->bankAccountNumber . PHP_EOL;
    }

    public function getName() : string
    {
        return $this->name;
    }
    public function setName(string $newName) : void
    {
        $this->name = $newName;
    }

    public function getSurname() : string
    {
        return $this->surname;
    }
    public function setSurname(string $newSurname) : void
    {
        $this->surname = $newSurname;
    }

    public function getPatronymic() : string
    {
        return $this->patronymic;
    }
    public function setPatronymic(string $newPatronymic) : void
    {
        $this->patronymic = $newPatronymic;
    }

    public function getAddress() : string
    {
        return $this->address->getAddress();
    }
    public function setAddress(Address $newAddress) : void
    {
        $this->address = $newAddress;
    }

    public function getCreditCardNumber() : string
    {
        return $this->creditCardNumber;
    }
    public function setCreditCardNumber(string $newCreditCardNumber) : void
    {
        $this->creditCardNumber = $newCreditCardNumber;
    }

    public function getBankAccountNumber() : string
    {
        return $this->bankAccountNumber;
    }
    public function setBankAccountNumber(string $newBankAccountNumber) : void
    {
        $this->bankAccountNumber = $newBankAccountNumber;
    }
}
