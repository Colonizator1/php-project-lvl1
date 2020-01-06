<?php

namespace BrainGames\games\calcGame;

use function BrainGames\functions\startEngine;

define('CALC_RULES', 'What is the result of the expression?');
define('OPERATORS', ['+', '-', '*']);

function calcGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $randomOperator = OPERATORS[mt_rand(0, count(OPERATORS) - 1)];
        $question = "{$firstNum} {$randomOperator} {$secondNum}";
        switch ($randomOperator) {
            case '+':
                $result[$question] = $firstNum + $secondNum;
                break;
            case '-':
                $result[$question] = $firstNum - $secondNum;
                break;
            case '*':
                $result[$question] = $firstNum * $secondNum;
                break;
        }
    }
    return $result;
}
function startCalcGame()
{
    $arrQuestionsAnsewrs = calcGameQuestionsAndAnswers();
    startEngine(CALC_RULES, $arrQuestionsAnsewrs);
}
