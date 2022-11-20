<?php
require_once 'WrongLoginException.php';
require_once 'WrongPasswordException.php';

class Account
{
    public static function checkLogin(string $login, string $password, string $confirmPassword): bool
    {
        if(!self::isValidLogin($login)){
            return false;
        }
        if(!self::isValidPassword($password)){
            return false;
        }
        if(!self::isValidPassword($confirmPassword) || $confirmPassword !== $password){
            return false;
        }
        return true;
    }

    private static function isValidLogin(string $login): bool
    {
        $loginLength = strlen($login);
        if ($loginLength >= 20) {
            throw new WrongLoginException('Слишком длинный логин.');
        }
        if($loginLength === 0){
            throw new WrongLoginException('Логин пустой.');
        }
        if(!self::isEnglish($login)){
            throw new WrongLoginException('В логине используются неразрешенные символы.');
        }
        return true;
    }

    private static function isValidPassword(string $password): bool
    {
        $passwordLength = strlen($password);
        if ($passwordLength >= 20) {
            throw new WrongPasswordException('Слишком длинный пароль.');
        }
        if($passwordLength === 0){
            throw new WrongPasswordException('Пароль пустой.');
        }
        if(!self::isEnglish($password)){
            throw new WrongPasswordException('В пароле используются неразрешенные символы.');
        }
        return true;
    }

    private static function isEnglish(string $str) : bool{
        return !preg_match('/[^A-Za-z0-9_]/',$str);
    }
}