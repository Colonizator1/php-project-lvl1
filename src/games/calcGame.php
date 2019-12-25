<?php

namespace BrainGames\games\calcGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;

function calcGameQuestion()
{
    $firstNum = mt_rand(1, 100);
    $secondNum = mt_rand(1, 100);
    $operators = ['+', '-', '*'];
    $randomOperator = $operators[mt_rand(0, count($operators) - 1)];
    return "{$firstNum} {$randomOperator} {$secondNum}";
}
function calcGameCorrectAnswer($question)
{
    $array = explode(' ', $question);
    if ($array[1] === '+') {
        return $array[0] + $array[2];
    } elseif ($array[1] === '-') {
        return $array[0] - $array[2];
    } elseif ($array[1] === '*') {
        return $array[0] * $array[2];
    }
}
function startCalcGame(int $countReplayGames)
{
    $rules = 'What is the result of the expression?';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $question = calcGameQuestion();
        $correctAnswer = calcGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
