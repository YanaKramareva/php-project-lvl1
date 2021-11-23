<?php

namespace Brain\Games\brainCalc {

    use function Brain\src\Engine\Engine;

    function chooseOperation(): string
    {
        $operands_array = ['+', '-', '*'];
        $rand_key = array_rand($operands_array);
        return $operands_array[$rand_key];
    }

    function calculateCorrectAnswer(array $random_numbers, string $operand): string
    {
        $correct_answer = '';
        if ($operand == '+') {
            $correct_answer = $random_numbers[0] + $random_numbers[1];
        } elseif ($operand == '-') {
            $correct_answer = $random_numbers[0] - $random_numbers[1];
        } elseif ($operand == '*') {
            $correct_answer = $random_numbers[0] * $random_numbers[1];
        }
        return strval($correct_answer);
    }

    function brainCalc(int $iterations): void
    {
        $line = 'What is the result of the expression?';
        $operand = chooseOperation();
        $rounds = [];
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
            $question = "$random_numbers[0] $operand $random_numbers[1]";
            $answer = calculateCorrectAnswer($random_numbers, $operand);
            $rounds[$i] = [$question, $answer];
        }
        Engine($line, $rounds);
    }

}
