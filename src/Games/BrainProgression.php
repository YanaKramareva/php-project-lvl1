<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\engineGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function makeProgression(): array
{
    $startNumber = rand(1, 10);
    $step = rand(1, 10);
    $progression = [];
    $progression[0] = $startNumber;
    for ($i = 1; $i < 10; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }
    return $progression;
}

function hideNumberProgression(array $progression, int $missingNumber): string
{
    $hideNumberProgression = $progression;
           $hideNumberProgression[$missingNumber] = '..';
    return implode(' ', $hideNumberProgression);
}

function startGame(): void
{
    $startQuestion = 'What number is missing in the progression?';
        $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $progression = makeProgression();
        $missingNumber = rand(0, 9);
        $question = hideNumberProgression($progression, $missingNumber);
        $answer = $progression[$missingNumber];
        $rounds[$i] = [$question, $answer];
    }
    engineGame($startQuestion, $rounds);
}
