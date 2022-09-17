<?php
    function calculator(string $str) : int{
        $numbers = explode("+",$str,);
        $numbers2 = explode("-", $str);
        var_dump($numbers);
        var_dump($numbers2);
        return 0;
    }
    calculator("3+3+5-1+4");
?>