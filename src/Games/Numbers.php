<?php

namespace Brain\Games\Numbers;

function brainEven(int $number): string
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}
