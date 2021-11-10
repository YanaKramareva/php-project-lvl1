<?php

namespace Brain\Games\Engine {

    use function Brain\Games\brainCalc\brainCalc;
    use function Brain\Games\brainCalc\chooseOperation;
    use function Brain\Games\brainGCD\brainGCD;
    use function Brain\Games\brainPrime\brainPrime;
    use function Brain\Games\brainProgression\brainProgression;
    use function Brain\Games\brainProgression\makeProgression;
    use function Brain\Games\brainProgression\makeUserProgression;
    use function Brain\Games\Numbers\brainEven;
    use function cli\line;
    use function cli\prompt;

    /**Приветствие, возврат имени пользователя
     * @param $game
     * @return string
     */

    function welcome(string $line): string
    {
        line('Welcome to the Brain Game!');
        $user_name = prompt('May I have your name?');
        line('Hello, %s!', $user_name);
        line($line);
        return $user_name;
    }

    function askUser(string $game, array $random_numbers, string $operand = ' '): string
    {
        $request = $random_numbers[0] . $operand . $random_numbers[1];
        if (($game == 'brain-prime') | ($game == 'brain-even')) {
            $request = $random_numbers[0];
        } elseif ($game == 'brain-progression') {
            $request = implode(' ', $random_numbers);
        }
        $answer = prompt('Question: ', $request, ' ', true);
        line('Your answer %s', $answer);
        return $answer;
    }

    function isCorrectAnswer($user_answer, $correct_answer): bool
    {
        return $user_answer == $correct_answer ? true : false;
    }

    function answerToUser(bool $is_correct_answer, string $user_answer, string $correct_answer, string $user_name): bool
    {
        if ($is_correct_answer == true) {
            line('Correct!');
            $answer = true;
        } else {
            line("'%s' is wrong answer ;(", $user_answer);
            line("Correct answer was '%s'.", $correct_answer);
            showUserResult($is_correct_answer, $user_name);
            $answer = false;
        }
        return $answer;
    }

    /**
     * @param $is_correct_answer
     * @param $user_name
     * Печатает результат работы
     */
    function showUserResult($is_correct_answer, $user_name)
    {
        if ($is_correct_answer == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
    }


    function Engine($game, $iterations, $line)
    {
        $count_correct_answers = 0;
        $user_name = welcome($line);
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
            if ($game == 'brain-prime' | $game == 'brain-gcd' | $game == 'brain-even') {
                $user_answer = askUser($game, $random_numbers);
            }
            if ($game == 'brain-calc') {
                $operand = chooseOperation();
                $user_answer = askUser($game, $random_numbers, $operand);
                $correct_answer = brainCalc($random_numbers, $operand);
            } elseif ($game == 'brain-progression') {
                $progression = makeProgression($random_numbers);
                $missing_number = $random_numbers[0];
                $user_progression = makeUserProgression($progression, $missing_number);
                $user_answer = askUser($game, $user_progression);
                $correct_answer = brainProgression($progression, $missing_number);
            } elseif ($game == 'brain-prime') {
                $correct_answer = brainPrime($random_numbers[0]);
            } elseif ($game == 'brain-gcd') {
                $correct_answer = brainGCD($random_numbers);
            } elseif ($game == 'brain-even') {
                $correct_answer = brainEven($random_numbers[0]);
            }
            $is_correct_answer = isCorrectAnswer($user_answer, $correct_answer);
            $answerToUser = answerToUser($is_correct_answer, $user_answer, $correct_answer, $user_name);
            if ($answerToUser == true) {
                $count_correct_answers = $count_correct_answers + 1;
            } else {
                break;
            }
            if ($count_correct_answers == $iterations) {
                $all_correct = true;
                showUserResult($all_correct, $user_name);
            }
        }
    }
}
