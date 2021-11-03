<?php

namespace Brain\Games\List_of_functions {

    use function cli\line;
    use function cli\prompt;

    /**Приветствие, возврат имени пользователя
     *
     * @return string
     */
    function greet_user(): string
    {
        line('Welcome to the Brain Game!');
        $user_name = prompt('May I have your name?');
        line('Hello, %s!', $user_name);
        return $user_name;
    }

    function choose_numbers(): array
    {
        return $randomNumbers = [rand(0, 10), rand(0, 10)];
    }
    function ask_user_to_calculate($randomNumbers, $operation): string
    {
        $request = $randomNumbers[0] . $operation . $randomNumbers[1];
        $userAnswer = prompt('Question', $request);
        return $userAnswer;
    }

    function compare_is_correct_answer($userAnswer, $correctAnswer)
    {
        $result = 0;
        if (strcasecmp($userAnswer, $correctAnswer) == 0) {
            line('Correct!');
            $result = 1;
        } else {
            line('%s is wrong answer ;(', $userAnswer);
            line(' Correct answer was %s.', $correctAnswer);
        }
        return $result;
    }

    function calculate_correct_answer($randomNumbers, $operand): string
    {
        if ($operand == '+') {
            $correctAnswer = $randomNumbers[0] + $randomNumbers[1];
        } elseif ($operand == '-') {
            $correctAnswer = $randomNumbers[0] - $randomNumbers[1];
        } elseif ($operand == '*') {
            $correctAnswer = $randomNumbers[0] * $randomNumbers[1];
        }
        return $correctAnswer;
    }

    function choose_operation()
    {
        $array_of_operands = ['+', '-', '*'];
        $rand_key = array_rand($array_of_operands, 1);
        return $operand = $array_of_operands[$rand_key];
    }

    function show_user_result($countCorrectAnswers, $user_name)
    {
        if ($countCorrectAnswers == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
    }
}
