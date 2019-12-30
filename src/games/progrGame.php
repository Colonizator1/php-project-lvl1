<?php

namespace BrainGames\games\progrGame;

use function BrainGames\functions\engine;

define('PROGR_RULES', 'What number is missing in the progression?');

function progrGameQuestionsAndAnswers()
{
    $result = [];
    $lenthProgression = 10;
    for ($i = 1; $i <= COUNT_GAME; $i++) {
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
    $arrQuestionsAnsewrs = progrGameQuestionsAndAnswers();
    engine(PROGR_RULES, $arrQuestionsAnsewrs);
}
