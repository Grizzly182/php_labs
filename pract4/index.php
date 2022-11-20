<?php
require_once 'Account.php';
require_once 'WrongLoginException.php';
require_once 'WrongPasswordException.php';

try {
    if (!Account::checkLogin('as2d', 'd', 'd')) {
        echo 'false';
    } else
        echo 'true';
}
catch(WrongLoginException $e){
    echo $e->getMessage();
}
catch(WrongPasswordException $e){
    echo $e->getMessage();
}