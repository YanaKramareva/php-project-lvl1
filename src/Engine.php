<?php

namespace Brain\src\Engine {

    use function cli\line;
    use function cli\prompt;

    function Engine(string $line, array $rounds): void
    {
        $is_correct_answer = false;
        line('Welcome to the Brain Game!');
        $user_name = prompt('May I have your name?');
        line('Hello, %s!', $user_name);
        line($line);
        foreach ($rounds as $round) {
            [$question, $answer] = $round;
            line("Question: $question");
            $user_answer = prompt('Your answer');
            $user_answer == $answer ? $is_correct_answer = true : $is_correct_answer = false;
            if ($is_correct_answer == true) {
                line('Correct!');
            } else {
                line("'$user_answer' is wrong answer ;(. Correct answer was '$answer'.");
                break;
            }
        }
        if ($is_correct_answer == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
    }

}
