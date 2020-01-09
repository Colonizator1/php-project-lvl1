<?php

namespace BrainGames\games\primeGame;

use function BrainGames\engine\startEngine;

define('PRIME_RULE', 'Answer "yes" if given number is prime. Otherwise answer "no".');
function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($j = 2; $j <= floor($num / 2); $j++) {
        if ($num % $j == 0) {
            return false;
        }
    }
    return true;
}
function getPrimeGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= GAMESCOUNT; $i++) {
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
    $questionsAnsewrs = getPrimeGameQuestionsAndAnswers();
    startEngine(PRIME_RULE, $questionsAnsewrs);
}
