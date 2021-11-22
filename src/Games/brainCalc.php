<?php

namespace Brain\Games\brainCalc {

    use function Brain\src\Engine\askUser;
    use function Brain\src\Engine\Engine;
    use function Brain\src\Engine\showUserResult;
    use function Brain\src\Engine\welcome;

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
        $user_name = welcome($line);
        $operand = chooseOperation();
        $count_correct_answers = 0;
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
            $user_answer = askUser($random_numbers[0] . ' ' . $operand . ' ' . $random_numbers[1]);
            $correct_answer = calculateCorrectAnswer($random_numbers, $operand);
            if (Engine($user_answer, $correct_answer) == true) {
                $count_correct_answers += 1;
            } else {
                break;
            }
        }
            $results = (($count_correct_answers == $iterations) ? true : false);
        showUserResult($results, $user_name);
    }

}
