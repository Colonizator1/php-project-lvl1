<?php

namespace BrainGames\games\gcdGame;

use function BrainGames\functions\startEngine;

define('GCD_RULES', 'Find the greatest common divisor of given numbers.');

function getGCD(int $firstNum, int $secondNum)
{
    $firstNum >= $secondNum ? $maxDivisor = $secondNum : $maxDivisor = $firstNum;
    for ($divisor = $maxDivisor; $divisor > 0; $divisor--) {
        if ($firstNum % $divisor == 0 && $secondNum % $divisor == 0) {
            return $divisor;
        }
    }
}
function gcdGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $question = "{$firstNum} {$secondNum}";
        $result[$question] = getGCD($firstNum, $secondNum);
    }
    return $result;
}
function startGcdGame()
{
    $arrQuestionsAnsewrs = gcdGameQuestionsAndAnswers();
    startEngine(GCD_RULES, $arrQuestionsAnsewrs);
}
