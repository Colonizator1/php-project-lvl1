<?php

namespace BrainGames\games\gcdGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;
use function BrainGames\functions\gcdGameQuestion;
use function BrainGames\functions\gcdGameCorrectAnswer;

function startGcdGame(int $countReplayGames)
{
    $rules = 'Find the greatest common divisor of given numbers.';
    printHelloText($rules);
    //don't like that function, getname returns name and prints text in the sametime
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
