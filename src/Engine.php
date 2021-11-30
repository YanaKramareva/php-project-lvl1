<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function engine(string $startQuestion, array $rounds): void
{
    $isCorrectAnswer = false;
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    line($startQuestion);
    foreach ($rounds as $round) {
        [$question, $answer] = $round;
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $answer) {
            $isCorrectAnswer = true;
            line('Correct!');
        } else {
            $isCorrectAnswer = false;
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$answer}.");
            break;
        }
    }
    if ($isCorrectAnswer == true) {
        line('Congratulations, %s!', $userName);
    } else {
        line("Let's try again, %s!", $userName);
    }
}
