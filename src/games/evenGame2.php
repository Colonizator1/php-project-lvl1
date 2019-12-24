<?php

namespace BrainGames\games\evenGame2;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\evenGameQuestion;
use function BrainGames\functions\evenGameCorrectAnswer;
use function BrainGames\functions\gameResult;

function startEvenGame(int $countReplayGames)
{
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        //change here new game functions
        $question = evenGameQuestion();
        $correctAnswer = evenGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
