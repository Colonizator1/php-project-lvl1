<?php

namespace BrainGames\games\primeGame;

use function BrainGames\functions\engine;

define('PRIME_RULES', 'Answer "yes" if given number is prime. Otherwise answer "no".');

function primeGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $question = mt_rand(1, 100);
        for ($j = 2; $j <= floor($question / 2); $j++) {
            $question % $j === 0 ? $result[$question] = "no" : $result[$question] = "yes";
        }
    }
    return $result;
}
function startPrimeGame()
{
    $arrQuestionsAnsewrs = primeGameQuestionsAndAnswers();
    engine(PRIME_RULES, $arrQuestionsAnsewrs);
}
