<?php

require_once('User.php');
require_once('UserService.php');

$users = [
    new User('Zender', 'zender-cool', new DateTime('04.08.2007')),
    new User('Mikhail', 'dtb21SA9z', new DateTime('21.09.2004')),
    new User('Alexandr', 'dtb21S42N', new DateTime('26.04.2004')),
    new User('Oleg', '35z6yoxX', new DateTime('07.01.1997')),
    new User('Vladimir', 'ZzZzZzZz', new DateTime('13.05.2000')),
    new User('Daniil', 'HellYeah', new DateTime('31.12.1999'))
];

$sortedUsername = UserService::sortByUsername($users, 'desc');

UserService::displayUsers($sortedUsername);