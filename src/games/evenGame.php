<?php

namespace BrainGames\games\evenGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;

function evenGameQuestion()
{
    return mt_rand(1, 100);
}
function evenGameCorrectAnswer($num)
{
    if ($num % 2 === 0) {
        return "yes";
    } else {
        return "no";
    }
}
function startEvenGame(int $countReplayGames)
{
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $question = evenGameQuestion();
        $correctAnswer = evenGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
