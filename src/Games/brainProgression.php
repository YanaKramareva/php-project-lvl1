<?php

namespace Brain\Games\brainProgression {

    use function Brain\src\Engine\Engine;

    function makeProgression(array $random_numbers): array
    {
        $progression = [];
        [$start_number, $step] = $random_numbers;
        $progression[0] = $start_number;
        for ($i = 1; $i < 10; $i++) {
            $progression[$i] = $progression[$i - 1] + $step;
        }
        return $progression;
    }

    function makeUserProgression(array $progression, int $missing_number): string
    {
        $user_progression = [];
        for ($i = 0, $length = count($progression); $i < $length; $i++) {
            if ($i != $missing_number) {
                $user_progression[$i] = $progression[$i];
            } else {
                $user_progression[$i] = '..';
            }
        }
        return implode(' ', $user_progression);
    }

    function brainProgression(int $iterations): void
    {
        $line = 'What number is missing in the progression?';
            $rounds = [];
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
            $progression = makeProgression($random_numbers);
            $missing_number = rand(0, 9);
            $question = makeUserProgression($progression, $missing_number);
            $answer = $progression[$missing_number];
            $rounds[$i] = [$question, $answer];
        }
        Engine($line, $rounds);
    }

}
