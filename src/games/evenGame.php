<?php

namespace BrainGames\games\evenGame;

use function BrainGames\engine\startEngine;

define('EVEN_RULE', 'Answer "yes" if the number is even, otherwise answer "no".');

function isEven($num)
{
    return $num % 2 === 0;
}
function getEvenGameQuestionsAndAnswers()
{
    $results = [];
    for ($i = 1; $i <= GAMESCOUNT; $i++) {
        $question = mt_rand(1, 100);
        if (isEven($question)) {
            $results[$question] = "yes";
        } else {
            $results[$question] = "no";
        }
    }
    return $results;
}

function startEvenGame()
{
    $questionsAnsewrs = getEvenGameQuestionsAndAnswers();
    startEngine(EVEN_RULE, $questionsAnsewrs);
}
