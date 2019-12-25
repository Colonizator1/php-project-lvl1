<?php

namespace BrainGames\games\calcGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;
use function BrainGames\functions\calcGameQuestion;
use function BrainGames\functions\calcGameCorrectAnswer;

function startCalcGame(int $countReplayGames)
{
    $rules = 'What is the result of the expression?';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        //change here new game functions
        $question = calcGameQuestion();
        $correctAnswer = calcGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
