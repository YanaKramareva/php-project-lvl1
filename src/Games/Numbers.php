<?php

namespace Brain\Games\Numbers;

use function Brain\src\Engine\askUser;
use function Brain\src\Engine\Engine;
use function Brain\src\Engine\showUserResult;
use function Brain\src\Engine\welcome;

function calculateCorrectAnswer(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function brainEven(int $iterations): void
{
    $line = 'Answer "yes" if the number is even, otherwise answer "no".';
    $user_name = welcome($line);
    $count_correct_answers = 0;
    for ($i = 0; $i < $iterations; $i++) {
        $random_number = rand(1, 10);
        $user_answer = askUser("$random_number");
        $correct_answer = calculateCorrectAnswer($random_number);
        if (Engine($user_answer, $correct_answer) == true) {
            $count_correct_answers += 1;
        } else {
            break;
        }
    }
    $results = (($count_correct_answers == $iterations) ? true : false);
    showUserResult($results, $user_name);
}
