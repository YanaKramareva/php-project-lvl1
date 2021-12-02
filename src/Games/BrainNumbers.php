<?php

namespace BrainGames\Games\BrainNumbers;

use function BrainGames\Engine\engineGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isEvenNumber(int $number): bool
{
    return $number % 2 === 0;
}

function startGame(): void
{
    $startQuestion = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 10);
        $question = (string) $randomNumber;
        $answer = (isEvenNumber($randomNumber) === true ? 'yes' : 'no');
        $rounds[$i] = [$question, $answer];
    }
    engineGame($startQuestion, $rounds);
}
