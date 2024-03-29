<?php
require_once('User.php');

/**
 * Summary of UserService
 */
class UserService
{
    /**
     * Summary of sortByUsername
     * @param array<User> $users
     * @param string $sortOrder 'desc' is Descending, 'asc' is Ascending
     * @return array<User> $sortedUsers
     */
    public static function sortByUsername(array $users, string $sortOrder = 'asc'): array
    {
        $sortedArray = $users;
        $sortMethod = null;

        switch ($sortOrder) {

            case 'desc':
                $sortMethod = function ($x, $y) {
                    return $y->getUsername() <=> $x->getUsername();
                };
                break;

            case 'asc':
                $sortMethod = function ($x, $y) {
                    return $x->getUsername() <=> $y->getUsername();
                };
                break;

            default:
                throw new InvalidArgumentException('Invalid sorting order!');
        }
        usort(
            $sortedArray,
            $sortMethod
        );

        return $sortedArray;
    }

    /**
     * Summary of sortByUsername
     * @param array<User> $users
     * @param string $sortOrder 'older' is older first, 'younger' is younger first
     * @return array<User> $sortedUsers
     */
    public static function sortByBirthday(array $users, string $sortOrder = 'older'): array
    {
        $sortedArray = $users;

        $sortMethod = null;

        switch ($sortOrder) {

            case 'younger':
                $sortMethod = function ($x, $y) {
                    return $y->getBirthday() <=> $x->getBirthday();
                };
                break;

            case 'older':
                $sortMethod = function ($x, $y) {
                    return $x->getBirthday() <=> $y->getBirthday();
                };
                break;

            default:
                throw new InvalidArgumentException('Invalid sorting order!');
        }
        usort(
            $sortedArray,
            $sortMethod
        );

        return $sortedArray;
    }

    /**
     * Summary of displayUsers
     * @param array<User> $users
     * @return void
     */
    public static function displayUsers(array $users): void
    {
        foreach ($users as $user) {
            echo 'Username: ' . $user->getUsername() . PHP_EOL;
            echo 'Password: ' . $user->getPassword() . PHP_EOL;
            echo 'Birthday: ' . $user->getBirthdayDate() . PHP_EOL;
            echo PHP_EOL;
        }
    }
}