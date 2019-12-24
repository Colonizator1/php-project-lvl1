<?php

namespace BrainGames\games\evenGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\printResult;

function startCalcGame(int $countReplayGames)
{
    printHelloText('Answer "yes" if the number is even, otherwise answer "no".');
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $operators = ['+', '-', '*'];
        $randomOperator = $operators[mt_rand(0, count($operators) - 1)];
        $expression = "{$firstNum} {$randomOperator} {$secondNum}";
        line("Question: {$expression}");
        if ($randomOperator === '+') {
            $correctAnswer = $firstNum + $secondNum;
        } elseif ($randomOperator === '-') {
            $correctAnswer = $firstNum - $secondNum;
        } elseif ($randomOperator === '*') {
            $correctAnswer = $firstNum * $secondNum;
        }
        $answer = prompt("Your answer");
        if (!printResult($answer, $correctAnswer)) {
            line("Let's try again, $name!");
            break;
        }
        if ($i == $countReplayGames) {
            line("Congratulations, $name!");
        }
    }
}
