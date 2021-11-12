<?php

namespace Brain\Games\brainGCD;

use Brain\Games\Engine;

function brainGCD(array $random_numbers): int
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

function EngineBrainGCD(): bool
{
    $game = 'brain-gcd';
    $line = 'Find the greatest common divisor of given numbers.';
    $iterations = 3;
    return Engine\Engine($game, $iterations, $line);
}
