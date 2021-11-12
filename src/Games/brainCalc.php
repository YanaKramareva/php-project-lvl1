<?php

namespace Brain\Games\brainCalc {

    use Brain\Games\Engine;

    /**
     * Выбирает произвольно математическую операцию.
     * @return string
     */
    function chooseOperation(): string
    {
        $operands_array = ['+', '-', '*'];
        $rand_key = array_rand($operands_array);
        return $operands_array[$rand_key];
    }

    /**
     * Принимает на вход числа и операнд, возвращает результат.
     * @param $random_numbers
     * @param $operand
     * @return string
     */
    function brainCalc(array $random_numbers, string $operand): string
    {
        $correct_answer = '';
        if ($operand == '+') {
            $correct_answer = $random_numbers[0] + $random_numbers[1];
        } elseif ($operand == '-') {
            $correct_answer = $random_numbers[0] - $random_numbers[1];
        } elseif ($operand == '*') {
            $correct_answer = $random_numbers[0] * $random_numbers[1];
        }
        return "$correct_answer";
    }

    function EngineBrainCalc(): bool
    {
        $game = 'brain-calc';
        $line = 'What is the result of the expression?';
        $iterations = 3;
        return Engine\Engine($game, $iterations, $line);
    }
}
