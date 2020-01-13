<?php

namespace BrainGames\games\evenGame;

use function BrainGames\engine\startEngine;

use const BrainGames\engine\GAMES_COUNT;

define('EVEN_RULE', 'Answer "yes" if the number is even, otherwise answer "no".');

function isEven($num)
{
    return $num % 2 === 0;
}

function getEvenGameQuestionsAndAnswers()
{
    $questionsAnsewrs = [];
    for ($i = 1; $i <= GAMES_COUNT; $i++) {
        $question = mt_rand(1, 100);
        $questionsAnsewrs[$question] = isEven($question) ? "yes" : "no";
    }
    return $questionsAnsewrs;
}

function startEvenGame()
{
    $questionsAnsewrs = getEvenGameQuestionsAndAnswers();
    startEngine(EVEN_RULE, $questionsAnsewrs);
}
