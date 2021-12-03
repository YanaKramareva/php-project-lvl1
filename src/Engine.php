<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function askQuestion(array $round, string $userName): bool
{
    [$question, $answer] = $round;
    line("Question: {$question}");
    $userAnswer = prompt('Your answer');
    if ($userAnswer != $answer) {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$answer}.");
        line("Let's try again, %s!", $userName);
        return false;
    } else {
        line('Correct!');
        return true;
    }
}

function runGame(string $startQuestion, array $rounds): void
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    line($startQuestion);
    $roundAnswer = false;
    foreach ($rounds as $round) {
        $roundAnswer = askQuestion($round, $userName);
        if (!$roundAnswer) {
            break;
        }
    }
    if ($roundAnswer) {
        line('Congratulations, %s!', $userName);
    }
}
