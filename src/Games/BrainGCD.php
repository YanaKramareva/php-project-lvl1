<?php

namespace BrainGames\Games\BrainGCD;

use function BrainGames\Engine\engineGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function calculateGCD(int $randomNumber1, int $randomNumber2): string
{
    while (true) {
        if ($randomNumber1 == $randomNumber2) {
            return (string) $randomNumber2;
        }
        if ($randomNumber1 > $randomNumber2) {
            $randomNumber1 = $randomNumber1 - $randomNumber2;
        } else {
            $randomNumber2 = $randomNumber2 - $randomNumber1;
        }
    }
}

function startGame(): void
{
    $startQuestion = 'Find the greatest common divisor of given numbers.';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $question = "{$randomNumber1} {$randomNumber2}";
        $answer = calculateGCD($randomNumber1, $randomNumber2);
        $rounds[$i] = [$question, $answer];
    }
    engineGame($startQuestion, $rounds);
}
