<?php

namespace Brain\Games\Engine {

    use function Brain\Games\brainCalc\brainCalc;
    use function Brain\Games\brainCalc\chooseOperation;
    use function Brain\Games\brainGCD\brainGCD;
    use function Brain\Games\brainPrime\brainPrime;
    use function Brain\Games\brainProgression\brainProgression;
    use function Brain\Games\brainProgression\makeProgression;
    use function Brain\Games\brainProgression\makeUserProgression;
    use function cli\line;
    use function cli\prompt;

    /**Приветствие, возврат имени пользователя
     * @param $game
     * @return string
     */

    function welcome($game): string
    {
        line('Welcome to the Brain Game!');
        $user_name = prompt('May I have your name?');
        line('Hello, %s!', $user_name);
        if ($game == 'brain-calc') {
            line('What is the result of the expression?');
        } elseif ($game == 'brain-prime') {
            line('Answer "yes" if given number is prime. Otherwise answer "no".');
        } elseif ($game == 'brain-progression') {
            line('What number is missing in the progression?');
        } elseif ($game == 'brain-gcd') {
            line('Find the greatest common divisor of given numbers.');
        }
        return $user_name;
    }

    function askUser(string $game, array $random_numbers, string $operand = ' '): string
    {
        $request = $random_numbers[0] . $operand . $random_numbers[1];
        if ($game == 'brain-prime') {
            $request =  $random_numbers[0];
        } elseif ($game == 'brain-progression') {
            $request = implode(' ', $random_numbers);
        }
        $answer = prompt('Question: ', $request);
        line('Your answer %s', $answer);
        return $answer;
    }
    function isCorrectAnswer($user_answer, $correct_answer): bool
    {
        return $user_answer == $correct_answer ? true : false;
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


    function Engine($game, $iterations)
    {
        $count_correct_answers = 0;
        $user_name = welcome($game);
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
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
                $user_answer = askUser($game, $random_numbers);
                $correct_answer = brainPrime($random_numbers[0]);
            } elseif ($game == 'brain-gcd') {
                $user_answer = askUser($game, $random_numbers);
                $correct_answer = brainGCD($random_numbers);
            }
            $is_correct_answer = isCorrectAnswer($user_answer, $correct_answer);
            if ($is_correct_answer == true) {
                $count_correct_answers = $count_correct_answers + 1;
                line('Correct!');
            } else {
                line('%s is wrong answer ;(', $user_answer);
                line('Correct answer was %s.', $correct_answer);
                showUserResult($is_correct_answer, $user_name);
                break;
            }
        }

        if ($count_correct_answers == $iterations) {
            $all_correct = true;
            showUserResult($all_correct, $user_name);
        }
    }
}
