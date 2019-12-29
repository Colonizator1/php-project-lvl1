<?php

namespace BrainGames\games\primeGame;

use function BrainGames\functions\engine;

function primeGameQuestionsAndAnswers($countOfQuestions)
{
    $result = [];
    for ($i = 1; $i <= $countOfQuestions; $i++) {
        $question = mt_rand(1, 100);
        for ($j = 2; $j <= floor($question / 2); $j++) {
            $question % $j === 0 ? $result[$question] = "no" : $result[$question] = "yes";
        }
    }
    return $result;
}
function startPrimeGame()
{
    $countReplayGames = 3;
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $arrQuestionsAnsewrs = primeGameQuestionsAndAnswers($countReplayGames);
    engine($rules, $arrQuestionsAnsewrs);
}
