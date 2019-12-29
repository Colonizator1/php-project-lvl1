<?php

namespace BrainGames\games\progrGame;

use function BrainGames\functions\engine;

function progrGameQuestionsAndAnswers($countOfQuestions)
{
    $result = [];
    $lenthProgression = 10;
    for ($i = 1; $i <= $countOfQuestions; $i++) {
        $startProgression = mt_rand(1, 20);
        $diffProgression = mt_rand(1, 10);
        $unknownNum = mt_rand(1, 10);
        $progression = [$startProgression];
        for ($j = 1; $j < $lenthProgression; $j++) {
            $progression[$j] = $startProgression + $diffProgression * $j;
        }
        $unknown = $progression[$unknownNum];
        $progression[$unknownNum] = "..";
        $strProgression = implode(" ", $progression);
        $question = "$strProgression";
        $result[$question] = $unknown;
    }
    return $result;
}
function startProgrGame()
{
    $countReplayGames = 3;
    $rules = 'What number is missing in the progression?';
    $arrQuestionsAnsewrs = progrGameQuestionsAndAnswers($countReplayGames);
    engine($rules, $arrQuestionsAnsewrs);
}
