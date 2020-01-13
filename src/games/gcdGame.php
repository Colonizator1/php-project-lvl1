<?php

namespace BrainGames\games\gcdGame;

use function BrainGames\engine\startEngine;

use const BrainGames\engine\GAMES_COUNT;

define('GCD_RULE', 'Find the greatest common divisor of given numbers.');

function getGCD(int $firstNum, int $secondNum)
{
    $firstNum >= $secondNum ? $maxDivisor = $secondNum : $maxDivisor = $firstNum;
    for ($divisor = $maxDivisor; $divisor > 0; $divisor--) {
        if ($firstNum % $divisor == 0 && $secondNum % $divisor == 0) {
            return $divisor;
        }
    }
}

function getGcdGameQuestionsAndAnswers()
{
    $questionsAnsewrs = [];
    for ($i = 1; $i <= GAMES_COUNT; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $question = "{$firstNum} {$secondNum}";
        $questionsAnsewrs[$question] = getGCD($firstNum, $secondNum);
    }
    return $questionsAnsewrs;
}

function startGcdGame()
{
    $questionsAnsewrs = getGcdGameQuestionsAndAnswers();
    startEngine(GCD_RULE, $questionsAnsewrs);
}
