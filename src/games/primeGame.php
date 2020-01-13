<?php

namespace BrainGames\games\primeGame;

use function BrainGames\engine\startEngine;

use const BrainGames\engine\GAMES_COUNT;

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
    $questionsAnsewrs = [];
    for ($i = 1; $i <= GAMES_COUNT; $i++) {
        $question = mt_rand(1, 100);
        $questionsAnsewrs[$question] = isPrime($question) ? "yes" : "no";
    }
    return $questionsAnsewrs;
}

function startPrimeGame()
{
    $questionsAnsewrs = getPrimeGameQuestionsAndAnswers();
    startEngine(PRIME_RULE, $questionsAnsewrs);
}
