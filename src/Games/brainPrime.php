<?php

namespace Brain\Games\brainPrime;

use Brain\Games\Engine;

function brainPrime(int $is_simple_number): string
{
    $correct_answer = 'yes';
    for ($i = 2; $i < $is_simple_number; $i++) {
        if ($is_simple_number % $i == 0) {
            $correct_answer = 'no';
            break;
        }
    }
    return $correct_answer;
}

function EngineBrainPrime()
{
    $game = 'brain-prime';
    $line = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $iterations = 1;
    Engine\Engine($game, $iterations, $line);
    return null;
}
