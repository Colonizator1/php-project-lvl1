<?php

namespace BrainGames\games\calcGame;

use function BrainGames\functions\engine;

define('CALC_RULES', 'What is the result of the expression?');

function calcGameQuestionsAndAnswers()
{
    $result = [];
    for ($i = 1; $i <= COUNT_GAME; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $operators = ['+', '-', '*'];
        $randomOperator = $operators[mt_rand(0, count($operators) - 1)];
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
    engine(CALC_RULES, $arrQuestionsAnsewrs);
}
