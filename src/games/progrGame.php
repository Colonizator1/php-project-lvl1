<?php

namespace BrainGames\games\progrGame;

use function BrainGames\engine\startEngine;

use const BrainGames\engine\GAMES_COUNT;

define('PROGR_RULE', 'What number is missing in the progression?');
define('LENGTH', 10);

function generateProgression($startProgression, $diffProgression, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $startProgression + $diffProgression * $i;
    }
    return $progression;
}

function getProgrGameQuestionsAndAnswers()
{
    $questionsAnsewrs = [];
    for ($i = 1; $i <= GAMES_COUNT; $i++) {
        $startProgression = mt_rand(1, 20);
        $diffProgression = mt_rand(1, 10);
        $progression = generateProgression($startProgression, $diffProgression, LENGTH);
        $unknownNumPosition = mt_rand(0, LENGTH - 1);
        $answer = $progression[$unknownNumPosition];
        $progression[$unknownNumPosition] = "..";
        $question = implode(" ", $progression);
        $questionsAnsewrs[$question] = $answer;
    }
    return $questionsAnsewrs;
}

function startProgrGame()
{
    $questionsAnsewrs = getProgrGameQuestionsAndAnswers();
    startEngine(PROGR_RULE, $questionsAnsewrs);
}
