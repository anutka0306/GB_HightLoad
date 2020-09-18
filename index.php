
<?php

function isEven($number){
        if($number < 0){
                $number = abs($number);
        }
        if($number%2==0){
                return $number . " is even";
        }
        return $number . " isn't enven";
}

echo isEven(5). "<br>";
echo isEven(6). "<br>";
    