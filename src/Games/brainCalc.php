<?php

namespace Brain\Games\brainCalc;

    use function Brain\src\Engine\engine;

    const ROUNDS_COUNT = 3;

function chooseOperand(): string
{
    $operandsArray = ["+","-", "*"];
    $randKey = array_rand($operandsArray);
    return $operandsArray[$randKey];
}

function calculateCorrectAnswer(int $randomNumber1, int $randomNumber2, string $operand): string
{
    $correctAnswer = 0;
    switch ($operand) {
        case "+":
                $correctAnswer = $randomNumber1 + $randomNumber2;
            return (string) $correctAnswer;
        case "-":
                $correctAnswer = $randomNumber1 - $randomNumber2;
            return (string) $correctAnswer;
        case "*":
                $correctAnswer = $randomNumber1 * $randomNumber2;
            return (string) $correctAnswer;
        default:
            return (string) $correctAnswer;
    }
}

function brainCalc(): void
{
    $line = 'What is the result of the expression?';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $operand = chooseOperand();
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $question = "{$randomNumber1}{$operand}{$randomNumber2}";
        $answer = calculateCorrectAnswer($randomNumber1, $randomNumber2, $operand);
        $rounds[$i] = [$question, $answer];
    }
    engine($line, $rounds);
}
