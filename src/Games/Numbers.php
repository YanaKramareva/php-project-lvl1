<?php

namespace Brain;

function calculateCorrectAnswerEven(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function brainEven(): void
{
    $startQuestion = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 10);
        $question = (string) $randomNumber;
        $answer = calculateCorrectAnswerEven($randomNumber);
        $rounds[$i] = [$question, $answer];
    }
    engine($startQuestion, $rounds);
}
