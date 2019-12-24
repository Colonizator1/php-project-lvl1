<?php

namespace BrainGames\games\gcdGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\calcGameQuestion;
use function BrainGames\functions\calcGameCorrectAnswer;
use function BrainGames\functions\gameResult;

function startGcdGame(int $countReplayGames)
{
    $rules = 'Find the greatest common divisor of given numbers.';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        //change here new game functions
        $question = gcdGameQuestion();
        $correctAnswer = gcdGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
