<?php

namespace Brain\Games\Numbers;

use Brain\Games\Engine;

function brainEven(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function EngineBrainEven(): bool
{
    $game = 'brain-even';
    $line = 'Answer "yes" if the number is even, otherwise answer "no".';
    $iterations = 3;
    return Engine\Engine($game, $iterations, $line);
}
