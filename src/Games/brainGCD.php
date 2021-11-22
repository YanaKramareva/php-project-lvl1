<?php

namespace Brain\Games\brainGCD;

use function Brain\src\Engine\askUser;
use function Brain\src\Engine\Engine;
use function Brain\src\Engine\showUserResult;
use function Brain\src\Engine\welcome;

function calculateCorrectAnswer(array $random_numbers): string
{
    [$number1, $number2] = $random_numbers;
    while (true) {
        if ($number1 == $number2) {
            return "$number2";
        }
        if ($number1 > $number2) {
            $number1 -= $number2;
        } else {
            $number2 -= $number1;
        }
    }
}

function brainGCD(int $iterations): void
{
    $line = 'Find the greatest common divisor of given numbers.';
    $user_name = welcome($line);
    $count_correct_answers = 0;
    for ($i = 0; $i < $iterations; $i++) {
        $random_numbers = [rand(1, 10), rand(1, 10)];
        $user_answer = askUser($random_numbers[0] . ' ' . $random_numbers[1]);
        $correct_answer = calculateCorrectAnswer($random_numbers);
        if (Engine($user_answer, $correct_answer) == true) {
            $count_correct_answers += 1;
        } else {
            break;
        }
    }
    $results = (($count_correct_answers == $iterations) ? true : false);
    showUserResult($results, $user_name);
}
