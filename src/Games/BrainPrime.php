<?php

namespace Brain;

function calculateCorrectAnswerPrime(int $isSimpleNumber): string
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
    $startQuestion = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 10);
        $question = (string) $randomNumber;
        $answer = calculateCorrectAnswerPrime($randomNumber);
        $rounds[$i] = [$question, $answer];
    }
    engine($startQuestion, $rounds);
}
