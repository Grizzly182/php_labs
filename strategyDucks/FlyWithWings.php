<?php
require_once 'FlyBehavior.php';

class FlyWithWings implements FlyBehavior
{
    public function fly(): void
    {
        echo 'Летает на крыльях.' . PHP_EOL;
    }
}