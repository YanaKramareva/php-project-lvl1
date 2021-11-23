<?php

namespace Brain\Games\brainGCD;

use function Brain\src\Engine\Engine;

function calculateCorrectAnswer(array $random_numbers): string
{
    [$number1, $number2] = $random_numbers;
    while (true) {
        if ($number1 == $number2) {
            return "$number2";
        }
        if ($number1 > $number2) {
            $number1 = $number1 - $number2;
        } else {
            $number2 = $number2 - $number1;
        }
    }
}

function brainGCD(int $iterations): void
{
    $line = 'Find the greatest common divisor of given numbers.';
    $rounds = [];
    for ($i = 0; $i < $iterations; $i++) {
        $random_numbers = [rand(1, 10), rand(1, 10)];
        $question = "$random_numbers[0]  $random_numbers[1]";
        $answer = calculateCorrectAnswer($random_numbers);
        $rounds[$i] = [$question, $answer];
    }
    Engine($line, $rounds);
}
