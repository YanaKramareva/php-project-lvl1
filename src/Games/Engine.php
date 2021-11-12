<?php

namespace Brain\Games\Engine {

    use function Brain\Games\brainCalc\brainCalc;
    use function Brain\Games\brainCalc\chooseOperation;
    use function Brain\Games\brainGCD\brainGCD;
    use function Brain\Games\brainPrime\brainPrime;
    use function Brain\Games\brainProgression\makeProgression;
    use function Brain\Games\brainProgression\makeUserProgression;
    use function Brain\Games\Numbers\brainEven;
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
        return  prompt('Your answer');
    }

    function isCorrectAnswer(string $user_answer, string $correct_answer): bool
    {
        return $user_answer == $correct_answer ? true : false;
    }

    function answerToUser(bool $is_correct_answer, string $user_answer, string $correct_answer, string $user_name): bool
    {
        if ($is_correct_answer == true) {
            line('Correct!');
            $answer = true;
        } else {
            line("'$user_answer' is wrong answer ;(. Correct answer was '$correct_answer'.");
            $answer = false;
        }
        return $answer;
    }

    function showUserResult(bool $is_correct_answer, string $user_name): bool
    {
        if ($is_correct_answer == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
        return $is_correct_answer;
    }

    function Engine(string $game, int $iterations, string $user_name): bool
    {
        $user_answer = '';
        $correct_answer = '';
        $is_correct_answer = true;
        $count_correct_answers = 0;
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
            if ($game == 'brain-calc') {
                $operand = chooseOperation();
                $user_answer = askUser($random_numbers[0] . ' ' . $operand . ' ' . $random_numbers[1]);
                $correct_answer = brainCalc($random_numbers, $operand);
            } elseif ($game == 'brain-progression') {
                $progression = makeProgression($random_numbers);
                $missing_number = rand(0, 9);
                $user_progression = makeUserProgression($progression, $missing_number);
                $user_answer = askUser($user_progression);
                $correct_answer = $progression[$missing_number];
            } elseif ($game == 'brain-prime') {
                $user_answer = askUser("$random_numbers[1]");
                $correct_answer = brainPrime($random_numbers[1]);
            } elseif ($game == 'brain-gcd') {
                $user_answer = askUser($random_numbers[0] . ' ' . $random_numbers[1]);
                $correct_answer = brainGCD($random_numbers);
            } elseif ($game == 'brain-even') {
                $user_answer = askUser("$random_numbers[1]");
                $correct_answer = brainEven($random_numbers[1]);
            }
            if (isCorrectAnswer($user_answer, $correct_answer) == false) {
                $is_correct_answer = false;
            }
            $answerToUser = answerToUser($is_correct_answer, $user_answer, $correct_answer, $user_name);
            if ($answerToUser == true) {
                $count_correct_answers += 1;
            } else {
                break;
            }
        }
        return $count_correct_answers == $iterations;
    }
}
