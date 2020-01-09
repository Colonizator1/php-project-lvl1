<?php

namespace BrainGames\games\progrGame;

use function BrainGames\engine\startEngine;

define('PROGR_RULE', 'What number is missing in the progression?');
define('LENGTH', 10);
function generateProgression($length)
{
    $startProgression = mt_rand(1, 20);
    $diffProgression = mt_rand(1, 10);
    $results = [];
    for ($i = 0; $i < $length; $i++) {
        $results[$i] = $startProgression + $diffProgression * $i;
    }
    return $results;
}
function getProgrGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= GAMESCOUNT; $i++) {
        $progression = generateProgression(LENGTH);
        $unknownNumPosition = mt_rand(1, LENGTH);
        $answer = $progression[$unknownNumPosition];
        $progression[$unknownNumPosition] = "..";
        $strProgression = implode(" ", $progression);
        $question = "$strProgression";
        $result[$question] = $answer;
    }
    return $result;
}
function startProgrGame()
{
    $questionsAnsewrs = getProgrGameQuestionsAndAnswers();
    startEngine(PROGR_RULE, $questionsAnsewrs);
}
