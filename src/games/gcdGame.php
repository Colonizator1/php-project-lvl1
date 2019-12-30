<?php

namespace BrainGames\games\gcdGame;

use function BrainGames\functions\engine;

define('GCD_RULES', 'Find the greatest common divisor of given numbers.');

function gcdGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $question = "{$firstNum} {$secondNum}";
        $firstNum >= $secondNum ? $maxDivisor = $secondNum : $maxDivisor = $firstNum;
        for ($div = $maxDivisor; $div > 0; $div--) {
            if ($firstNum % $div == 0 && $secondNum % $div == 0) {
                $result[$question] = $div;
                break;
            }
        }
    }
    return $result;
}
function startGcdGame()
{
    $arrQuestionsAnsewrs = gcdGameQuestionsAndAnswers();
    engine(GCD_RULES, $arrQuestionsAnsewrs);
}
