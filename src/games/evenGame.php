<?php

namespace BrainGames\games\evenGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\printResult;

function startEvenGame(int $countReplayGames)
{
    printHelloText('Answer "yes" if the number is even, otherwise answer "no".');
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $randomNum = mt_rand(1, 100);
        line("Question: {$randomNum}");
        if ($randomNum % 2 === 0) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }
        $answer = prompt("Your answer");
        if(!printResult($answer, $correctAnswer)) {
            line("Let's try again, $name!");
            break;
        }
        if ($i == $countReplayGames) {
            line("Congratulations, $name!");
        }
    }
}
