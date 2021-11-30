<?php

namespace Brain;

function makeProgression(int $startNumber, int $step): array
{
    $progression = [];
    $progression[0] = $startNumber;
    for ($i = 1; $i < 10; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }
    return $progression;
}

function makeUserProgression(array $progression, int $missingNumber): string
{
    $userProgression = [];
    for ($i = 0, $length = count($progression); $i < $length; $i++) {
        if ($i != $missingNumber) {
            $userProgression[$i] = $progression[$i];
        } else {
            $userProgression[$i] = '..';
        }
    }
    return implode(' ', $userProgression);
}

function brainProgression(): void
{
    $startQuestion = 'What number is missing in the progression?';
        $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $progression = makeProgression($randomNumber1, $randomNumber2);
        $missingNumber = rand(0, 9);
        $question = makeUserProgression($progression, $missingNumber);
        $answer = $progression[$missingNumber];
        $rounds[$i] = [$question, $answer];
    }
    engine($startQuestion, $rounds);
}
