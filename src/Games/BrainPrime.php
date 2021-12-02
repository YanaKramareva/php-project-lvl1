<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\engineGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isPrimeNumber(int $isSimpleNumber): bool
{
    $correctAnswer = true;
    if ($isSimpleNumber < 2) {
        $correctAnswer = false;
    }
    for ($i = 2; $i < $isSimpleNumber; $i++) {
        if ($isSimpleNumber % $i == 0) {
            $correctAnswer = false;
            break;
        }
    }
    return $correctAnswer;
}

function startGame(): void
{
    $startQuestion = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 10);
        $question = (string) $randomNumber;
         $answer = (isPrimeNumber($randomNumber) === true) ? 'yes' : 'no';
        $rounds[$i] = [$question, $answer];
    }
    engineGame($startQuestion, $rounds);
}
