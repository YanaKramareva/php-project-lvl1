<?php

namespace Brain\src\Engine;

    use function cli\line;
    use function cli\prompt;

function engine(string $line, array $rounds): void
{
    $isCorrectAnswer = false;
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    line($line);
    foreach ($rounds as $round) {
        [$question, $answer] = $round;
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');
        $userAnswer == $answer ? $isCorrectAnswer = true : $isCorrectAnswer = false;
        if ($isCorrectAnswer == true) {
            line('Correct!');
        } else {
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
