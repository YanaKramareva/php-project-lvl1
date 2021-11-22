<?php

namespace Brain\src\Engine {

    use function cli\line;
    use function cli\prompt;

    function welcome(string $line): string
    {
        line('Welcome to the Brain Game!');
        $user_name = prompt('May I have your name?');
        line('Hello, %s!', $user_name);
        line($line);
        return $user_name;
    }

    function askUser(string $request): string
    {
        line("Question: $request");
        return prompt('Your answer');
    }

    function showUserResult(bool $is_correct_answer, string $user_name): void
    {
        if ($is_correct_answer == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
    }

    function Engine(string $user_answer, string $correct_answer): bool
    {
        $result = false;
        $user_answer == $correct_answer ? $is_correct_answer = true : $is_correct_answer = false;
        if ($is_correct_answer == true) {
            line('Correct!');
            $result = true;
        } else {
            line("'$user_answer' is wrong answer ;(. Correct answer was '$correct_answer'.");
        }
        return $result;
    }
}
