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

    /**
     * Выбирает произвольные числа от 0 до 10
     * @return array
     */
    function choose_numbers(): array
    {
        return [rand(0, 10), rand(0, 10)];
    }

    /**
     * Принимает на вход произвольные числа и операнд, формирует выражение, принимает ответ пользователя
     * @param $randomNumbers
     * @param $operand
     * @return string
     */
    function ask_to_calculate($randomNumbers, $operand): string
    {
        $request = $randomNumbers[0] . $operand . $randomNumbers[1];
        return prompt('Question', $request);
    }

    /**
     * Сравнивает ответ пользователя с правильным ответом.
     * При правильном ответе возвращает 1, иначе ноль
     * @param $userAnswer
     * @param $correctAnswer
     * @return int
     */
    function is_correct_answer($userAnswer, $correctAnswer): int
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

    /**
     * Принимает на вход числа и операнд, возвращает результат.
     * @param $randomNumbers
     * @param $operand
     * @return string
     */
    function calculate_correct_answer($randomNumbers, $operand): string
    {
        $correct_answer = '';
        if ($operand == '+') {
            $correct_answer = $randomNumbers[0] + $randomNumbers[1];
        } elseif ($operand == '-') {
            $correct_answer = $randomNumbers[0] - $randomNumbers[1];
        } elseif ($operand == '*') {
            $correct_answer = $randomNumbers[0] * $randomNumbers[1];
        }
        return $correct_answer;
    }

    /**
     * Выбирает произвольно математическую операцию.
     * @return string
     */
    function choose_operation(): string
    {
        $operands_array = ['+', '-', '*'];
        $rand_key = array_rand($operands_array);
        return $operands_array[$rand_key];
    }

    /**
     * @param $countCorrectAnswers
     * @param $user_name
     * Печатает результат работы
     */
    function show_user_result($countCorrectAnswers, $user_name)
    {
        if ($countCorrectAnswers == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
    }
}
