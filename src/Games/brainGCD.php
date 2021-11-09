<?php

namespace Brain\Games\brainGCD;

function brainGCD($random_numbers)
{
    [$number1, $number2] = $random_numbers;
    while (true) {
        if ($number1 == $number2) {
            return $number2;
        }
        if ($number1 > $number2) {
            $number1 -= $number2;
        } else {
            $number2 -= $number1;
        }
    }
}
