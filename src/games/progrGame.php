<?php

namespace BrainGames\games\progrGame;

use function BrainGames\engine\startEngine;

define('PROGR_RULE', 'What number is missing in the progression?');
define('LENGTH', 10);

function getProgrGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= GAMESCOUNT; $i++) {
        $startProgression = mt_rand(1, 20);
        $diffProgression = mt_rand(1, 10);
        $unknownNumPosition = mt_rand(1, LENGTH);
        $progression = [];
        for ($j = 0; $j < LENGTH; $j++) {
            $progression[$j] = $startProgression + $diffProgression * $j;
        }
        $unknown = $progression[$unknownNumPosition];
        $progression[$unknownNumPosition] = "..";
        $strProgression = implode(" ", $progression);
        $question = "$strProgression";
        $result[$question] = $unknown;
    }
    return $result;
}
function startProgrGame()
{
    $questionsAnsewrs = getProgrGameQuestionsAndAnswers();
    startEngine(PROGR_RULE, $questionsAnsewrs);
}
