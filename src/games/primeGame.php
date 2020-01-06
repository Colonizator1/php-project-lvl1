<?php

namespace BrainGames\games\primeGame;

use function BrainGames\functions\startEngine;

define('PRIME_RULES', 'Answer "yes" if given number is prime. Otherwise answer "no".');
function isPrime($num)
{
    for ($j = 2; $j <= floor($num / 2); $j++) {
        if ($num % $j == 0) {
            return false;
        }
    }
    return true;
}
function primeGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $question = mt_rand(1, 100);
        if (isPrime($question)) {
            $result[$question] = "yes";
        } else {
            $result[$question] = "no";
        }
    }
    return $result;
}
function startPrimeGame()
{
    $arrQuestionsAnsewrs = primeGameQuestionsAndAnswers();
    startEngine(PRIME_RULES, $arrQuestionsAnsewrs);
}
