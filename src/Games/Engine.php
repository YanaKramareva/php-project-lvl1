<?php

namespace Brain\Games\List_of_functions {

    use function cli\line;
    use function cli\prompt;

    /**Приветствие, возврат имени пользователя
     * @return string
     */
    function greetUser(): string
    {
        line('Welcome to the Brain Game!');
        $user_name = prompt('May I have your name?');
        line('Hello, %s!', $user_name);
        return $user_name;
    }

    /**
     * Выбирает произвольные числа от 1 до 10
     * @return array
     */
    function chooseNumbers(): array
    {
        return [rand(1, 10), rand(1, 10)];
    }

    /**
     * Принимает на вход произвольные числа и операнд, формирует выражение, принимает ответ пользователя
     * @param $random_numbers
     * @param $operand
     * @return string
     */
    function askToCalculate($random_numbers, $operand): string
    {
        $request = $random_numbers[0] . $operand . $random_numbers[1];
        return prompt('Question', $request);
    }

    /**
     * Выводит прогрессию пользователю с пропущенным значением
     * @param array $progression
     * @return string
     */
    function askToCalculateProgression(array $progression)
    {
        $user_progression = [];
        $missing_number = rand(1, 9);
                for ($i = 0,  $length = count($progression); $i < $length; $i++) {
            if ($i != $missing_number) {
                $user_progression[$i] = $progression[$i];
            } else {
                $user_progression[$i] = '..';
                $key = $i;
            }
            $user_version_progression = implode(' ', $user_progression);
            return prompt('Question:', $user_version_progression);

        }
    }

    /**
     * Сравнивает ответ пользователя с правильным ответом.
     * При правильном ответе возвращает 1, иначе ноль
     * @param $user_answer
     * @param $correct_answer
     * @return int
     */
    function isCorrectAnswer($user_answer, $correct_answer): int
    {
        $result = 0;
        if (strcasecmp($user_answer, $correct_answer) == 0) {
            line('Correct!');
            $result = 1;
        } else {
            line('%s is wrong answer ;(', $user_answer);
            line(' Correct answer was %s.', $correct_answer);
        }
        return $result;
    }
    function isCorrectAnswerProgression($user_answer, $correct_answer): int
    {
        $result = 0;
        if (array_diff($user_answer, $correct_answer) == []) {
            line('Correct!');
            $result = 1;
        } else {
            line('%s is wrong answer ;(', $user_answer);
            line(' Correct answer was %s.', $correct_answer);
        }
        return $result;
    }

    /**
     * Принимает на вход числа и операнд, возвращает результат.
     * @param $random_numbers
     * @param $operand
     * @return string
     */
    function calculateCorrectAnswer($random_numbers, $operand): string
    {
        $correct_answer = '';
        if ($operand == '+') {
            $correct_answer = $random_numbers[0] + $random_numbers[1];
        } elseif ($operand == '-') {
            $correct_answer = $random_numbers[0] - $random_numbers[1];
        } elseif ($operand == '*') {
            $correct_answer = $random_numbers[0] * $random_numbers[1];
        }
        return $correct_answer;
    }

    /**
     *Вычисляет наибольший общий делитель
     * @param $random_numbers
     * @return string
     */

    function gcd($random_numbers)
    {
        [$number1, $number2] = $random_numbers;
        while (true) {
            if ($number1 == $number2) {
                    return $number2;
            }
            if ($number1 > $number2) {
                $number1 -= $number2;
            } else {
                $number2 -= $number1;
            }
        }
    }

    /**
     * Формирует прогрессию из 10 элементов.
     * На вход принимает 2 случайных числа: первый элемент + шаг
     * @param $random_numbers
     * @return mixed
     */
    function makeProgression($random_numbers)
    {
        [$start_number, $step] = $random_numbers;
        $progression[0] = $start_number;
        for ($i = 1; $i < 10; $i++) {
            $progression[$i] = $progression[$i - 1] + $step;
        }
        return $progression;
    }

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
         * @param $count_correct_answers
         * @param $user_name
         * Печатает результат работы
         */
    function showUserResult($count_correct_answers, $user_name)
    {
        if ($count_correct_answers == true) {
            line('Congratulations, %s!', $user_name);
        } else {
            line("Let's try again, %s!", $user_name);
        }
    }
}
