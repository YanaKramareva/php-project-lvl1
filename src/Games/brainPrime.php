<?php

namespace Brain\Games\brainPrime;

use Brain\src\Engine;

function calculateCorrectAnswer(int $is_simple_number): string
{
    $correct_answer = 'yes';
    if ($is_simple_number == 1) {
        $correct_answer = 'no';
    }
    for ($i = 2; $i < $is_simple_number; $i++) {
        if ($is_simple_number % $i == 0) {
            $correct_answer = 'no';
            break;
        }
    }
    return $correct_answer;
}

function brainPrime(int $iterations): void
{
    $line = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < $iterations; $i++) {
        $random_number = rand(1, 10);
        $question = "$random_number";
        $answer = calculateCorrectAnswer($random_number);
        $rounds[$i] = [$question, $answer];
    }
    Engine\Engine($line, $rounds);
}
