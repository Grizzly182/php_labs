<?php
class Address
{
    private string $city;
    private string $street;
    private int $house;

    public function __construct(string $city, string $street, int $house)
    {
        if ($house <= 0) {
            throw new Exception('Неверный адрес!');
        }
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
    }
    public function getAddress() : string{
        return "{$this->city}, {$this->street} Street, {$this->house}";
    }
}
