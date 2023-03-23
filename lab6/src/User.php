<?php

class User
{
    private string $username;
    private string $password;
    private DateTime $birthday;

    public function __construct(string $username, string $password, DateTime $birthday)
    {
        $this->username = $username;
        $this->password = $password;
        $this->birthday = $birthday;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function getBirthdayDate(): string
    {
        return $this->birthday->format('d.m.Y');
    }
}