<?php

namespace Brain\Games\Numbers;

use function cli\line;
use function cli\prompt;

/**
Показывает пользователю три числа и
проверяет ответ на корректность определения четности, нечетности
 */
function chooseNumber()
{
    $arrayNumbers = [];
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $arrayNumbers[$i] = rand(0, 100);
    }
    $countCorrectAnswers = 0;
    foreach ($arrayNumbers as $Numbers) {
           $answer =  prompt('Question', $Numbers);
        if (($Numbers % 2 == 0 && $answer == 'yes') | ($Numbers % 2 != 0 && $answer == 'no')) {
            line('Correct!');
            $countCorrectAnswers = $countCorrectAnswers + 1;
        } elseif ($Numbers % 2 == 0 && $answer != 'yes') {
            line('%s is wrong answer ;(. Correct answer was "yes".', $answer);
            line("Let's try again, %s!", $name);
            break;
        } elseif ($Numbers % 2 != 0 && $answer != 'no') {
            line('%s is wrong answer ;(. Correct answer was "no".', $answer);
            line("Let's try again, %s!", $name);
            break;
        }
        if ($countCorrectAnswers == 3) {
            line('Congratulations, %s!', $name);
        }
    }
}
