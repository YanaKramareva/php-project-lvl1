<?php

namespace Brain\Games\brainProgression {

    use function Brain\src\Engine\askUser;
    use function Brain\src\Engine\Engine;
    use function Brain\src\Engine\showUserResult;
    use function Brain\src\Engine\welcome;

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
        $user_name = welcome($line);
        $count_correct_answers = 0;
        for ($i = 0; $i < $iterations; $i++) {
            $random_numbers = [rand(1, 10), rand(1, 10)];
            $progression = makeProgression($random_numbers);
            $missing_number = rand(0, 9);
            $user_progression = makeUserProgression($progression, $missing_number);
            $user_answer = askUser($user_progression);
            $correct_answer = $progression[$missing_number];
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
