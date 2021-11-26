<?php

namespace Brain\Games\Numbers;

use function Brain\src\Engine\engine;

const ROUNDS_COUNT = 3;

function calculateCorrectAnswer(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function brainEven(): void
{
    $line = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 10);
        $question = (string) $randomNumber;
        $answer = calculateCorrectAnswer($randomNumber);
        $rounds[$i] = [$question, $answer];
    }
    engine($line, $rounds);
}
