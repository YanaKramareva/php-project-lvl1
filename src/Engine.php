<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function engineGame(string $startQuestion, array $rounds): void
{
    $roundsAnswer = false;
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    line($startQuestion);
    foreach ($rounds as $round) {
        $roundsAnswer = false;
        [$question, $answer] = $round;
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');
        if ($userAnswer != $answer) {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$answer}.");
            line("Let's try again, %s!", $userName);
            break;
        } else {
            $roundsAnswer = true;
            line('Correct!');
        }
    }
    if ($roundsAnswer === true) {
        line('Congratulations, %s!', $userName);
    }
}
