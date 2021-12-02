<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\engineGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function chooseOperand(): string
{
    $operandsArray = ["+","-", "*"];
    $randKey = array_rand($operandsArray);
    return $operandsArray[$randKey];
}

function calculateCorrectAnswer(int $randomNumber1, int $randomNumber2, string $operand): string
{
    switch ($operand) {
        case "+":
            return (string) ($randomNumber1 + $randomNumber2);
        case "-":
            return (string) ($randomNumber1 - $randomNumber2);
        case "*":
            return (string) ($randomNumber1 * $randomNumber2);
        default:
            return "Operand not correct";
    }
}

function startGame(): void
{
    $functionQuestion = 'What is the result of the expression?';
    $rounds = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $operand = chooseOperand();
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $question = "{$randomNumber1} {$operand} {$randomNumber2}";
        $answer = calculateCorrectAnswer($randomNumber1, $randomNumber2, $operand);
        $rounds[$i] = [$question, $answer];
    }
    engineGame($functionQuestion, $rounds);
}
