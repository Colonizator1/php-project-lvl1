<?php

namespace BrainGames\games\evenGame;

use function BrainGames\functions\startEngine;

define('EVEN_RULES', 'Answer "yes" if the number is even, otherwise answer "no".');

function isEven($num)
{
    return $num % 2 === 0;
}
function evenGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $question = mt_rand(1, 100);
        if (isEven($question)) {
            $result[$question] = "yes";
        } else {
            $result[$question] = "no";
        }
    }
    return $result;
}

function startEvenGame()
{
    $arrQuestionsAnsewrs = evenGameQuestionsAndAnswers();
    startEngine(EVEN_RULES, $arrQuestionsAnsewrs);
}
