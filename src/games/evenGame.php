<?php

namespace BrainGames\games\evenGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;
use function BrainGames\functions\evenGameQuestion;
use function BrainGames\functions\evenGameCorrectAnswer;

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
