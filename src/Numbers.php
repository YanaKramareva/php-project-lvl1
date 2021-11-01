<?php

namespace Brain\Games\Numbers;

use function cli\line;
use function cli\prompt;

/**
Показывает пользователю три числа (текущий месяц, день, год)
проверяет ответ на корректность определения четности, нечетности
 */
function chooseNumber()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $arrayNumbers = [date('m'), date('d'), date('y')];
    foreach ($arrayNumbers as $Numbers) {
           $answer =  prompt('Question', $Numbers);
        if (($Numbers % 2 == 0 && $answer == 'yes') | ($Numbers % 2 != 0 && $answer == 'no')) {
            line('Correct!');
        } elseif ($Numbers % 2 == 0 && $answer != 'yes') {
            line('"No" is wrong answer ;(. Correct answer was "yes".');
            line("Let's try again, %s!", $name);
            break;
        } elseif ($Numbers % 2 != 0 && $answer == 'yes') {
            line('"Yes" is wrong answer ;(. Correct answer was "no".');
            line("Let's try again, %s!", $name);
            break;
        }
    }
}
