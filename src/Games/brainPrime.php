<?php

namespace Brain\Games\brainPrime;

use Brain\src\Engine;

const ROUNDS_COUNT = 3;

function calculateCorrectAnswer(int $isSimpleNumber): string
{
    $correctAnswer = 'yes';
    if ($isSimpleNumber < 2) {
        $correctAnswer = 'no';
    }
    for ($i = 2; $i < $isSimpleNumber; $i++) {
        if ($isSimpleNumber % $i == 0) {
            $correctAnswer = 'no';
            break;
        }
    }
    return $correctAnswer;
}

function brainPrime(): void
{
    $line = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 10);
        $question = (string) $randomNumber;
        $answer = calculateCorrectAnswer($randomNumber);
        $rounds[$i] = [$question, $answer];
    }
    Engine\engine($line, $rounds);
}
