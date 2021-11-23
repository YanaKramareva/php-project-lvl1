<?php

namespace Brain\Games\Numbers;

use function Brain\src\Engine\Engine;

function calculateCorrectAnswer(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function brainEven(int $iterations): void
{
    $line = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < $iterations; $i++) {
        $random_number = rand(1, 10);
        $question = "$random_number";
        $answer = calculateCorrectAnswer($random_number);
        $rounds[$i] = [$question, $answer];
    }
    Engine($line, $rounds);
}
