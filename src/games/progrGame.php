<?php

namespace BrainGames\games\progrGame;

use function BrainGames\functions\startEngine;

define('PROGR_RULES', 'What number is missing in the progression?');
define('LENTH_PROGR', 10);

function progrGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $startProgression = mt_rand(1, 20);
        $diffProgression = mt_rand(1, 10);
        $unknownNum = mt_rand(1, LENTH_PROGR);
        $progression = [$startProgression];
        for ($j = 1; $j < LENTH_PROGR; $j++) {
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
    startEngine(PROGR_RULES, $arrQuestionsAnsewrs);
}
