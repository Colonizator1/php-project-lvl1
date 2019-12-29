<?php

namespace BrainGames\games\evenGame;

use function BrainGames\functions\engine;

function evenGameQuestionsAndAnswers($countOfQuestions)
{
    $result = [];
    for ($i = 1; $i <= $countOfQuestions; $i++) {
        $question = mt_rand(1, 100);
        if ($question % 2 === 0) {
            $result[$question] = "yes";
        } else {
            $result[$question] = "no";
        }
    }
    return $result;
}
function startEvenGame()
{
    $countReplayGames = 3;
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    $arrQuestionsAnsewrs = evenGameQuestionsAndAnswers($countReplayGames);
    engine($rules, $arrQuestionsAnsewrs);
}
