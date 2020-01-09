<?php

namespace BrainGames\games\calcGame;

use function BrainGames\engine\startEngine;

define('CALC_RULE', 'What is the result of the expression?');
define('OPERATORS', ['+', '-', '*']);

function getCalcGameQuestionsAndAnswers()
{
    $results = [];
    for ($i = 1; $i <= GAMESCOUNT; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $randomOperator = OPERATORS[mt_rand(0, count(OPERATORS) - 1)];
        $question = "{$firstNum} {$randomOperator} {$secondNum}";
        switch ($randomOperator) {
            case '+':
                $results[$question] = $firstNum + $secondNum;
                break;
            case '-':
                $results[$question] = $firstNum - $secondNum;
                break;
            case '*':
                $results[$question] = $firstNum * $secondNum;
                break;
        }
    }
    return $results;
}
function startCalcGame()
{
    $questionsAnsewrs = getCalcGameQuestionsAndAnswers();
    startEngine(CALC_RULE, $questionsAnsewrs);
}
