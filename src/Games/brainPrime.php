<?php

namespace Brain\Games\brainPrime;

function brainPrime($is_simple_number): string
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
