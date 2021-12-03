<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isPrimeNumber(int $number): bool
{

    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
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
    runGame($startQuestion, $rounds);
}
