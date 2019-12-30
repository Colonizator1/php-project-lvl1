<?php

namespace BrainGames\games\evenGame;

use function BrainGames\functions\engine;

define('EVEN_RULES', 'Answer "yes" if the number is even, otherwise answer "no".');

function evenGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
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
    $arrQuestionsAnsewrs = evenGameQuestionsAndAnswers();
    engine(EVEN_RULES, $arrQuestionsAnsewrs);
}
