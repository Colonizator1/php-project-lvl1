<?php

namespace BrainGames\games\primeGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;

function primeGameQuestion()
{
    $num = mt_rand(1, 100);
    return $num;
}
function primeGameCorrectAnswer($num)
{
    for ($i = 2; $i <= floor($num / 2); $i++) {
        if ($num % $i === 0) {
            return "no";
        }
    }
    return "yes";
}
function startPrimeGame(int $countReplayGames)
{
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $question = primeGameQuestion();
        $correctAnswer = primeGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
