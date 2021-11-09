<?php

namespace Brain\Games\brainProgression {

    /**
     * Формирует прогрессию из 10 элементов.
     * На вход принимает 2 случайных числа: первый элемент + шаг
     * @param array $random_numbers
     * @return array
     */
    function makeProgression(array $random_numbers): array
    {
        [$start_number, $step] = $random_numbers;
        $progression[0] = $start_number;
        for ($i = 1; $i < 10; $i++) {
            $progression[$i] = $progression[$i - 1] + $step;
        }
        return $progression;
    }

    function makeUserProgression(array $progression, string $missing_number): array
    {
        for ($i = 0, $length = count($progression); $i < $length; $i++) {
            if ($i != $missing_number) {
                $user_progression[$i] = $progression[$i];
            } else {
                $user_progression[$i] = '..';
            }
        }
        return $user_progression;
    }

    function brainProgression(array $progression, string $missing_number): string
    {
               return $progression[$missing_number];
    }

}
