<?php

namespace BrainGames\games\gcdGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;

function gcdGameQuestion()
{
    $firstNum = mt_rand(1, 100);
    $secondNum = mt_rand(1, 100);
    return "{$firstNum} {$secondNum}";
}
function gcdGameCorrectAnswer($question)
{
    $array = explode(' ', $question);
    $firstNum = $array[0];
    $secondNum = $array[1];
    $firstNum >= $secondNum ? $maxDivisor = $secondNum : $maxDivisor = $firstNum;
    for ($div = $maxDivisor; $div > 0; $div--) {
        if ($firstNum % $div == 0 && $secondNum % $div == 0) {
            return $div;
        }
    }
}
function startGcdGame(int $countReplayGames)
{
    $rules = 'Find the greatest common divisor of given numbers.';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $question = gcdGameQuestion();
        $correctAnswer = gcdGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
