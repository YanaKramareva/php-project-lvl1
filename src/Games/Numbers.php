<?php

namespace Brain\Games\Numbers;

use Brain\Games\Engine;

function brainEven(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function EngineBrainEven()
{
    $game = 'brain-even';
    $line = 'Answer "yes" if the number is even, otherwise answer "no".';
    $iterations = 3;
    $user_name = Engine\welcome($line);
    $all_correct_answers = Engine\Engine($game, $iterations, $user_name);
    Engine\showUserResult($all_correct_answers, $user_name);
    return null;
}
