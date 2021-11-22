<?php

namespace Brain\src\Cli;

use function cli\line;
use function cli\prompt;

function getName(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
}