<?php

namespace BrainGames\games\calcGame;

use function BrainGames\engine\startEngine;

use const BrainGames\engine\GAMES_COUNT;

define('CALC_RULE', 'What is the result of the expression?');
define('OPERATORS', ['+', '-', '*']);

function getCalcGameQuestionsAndAnswers()
{
    $questionsAnsewrs = [];
    for ($i = 1; $i <= GAMES_COUNT; $i++) {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $randomOperator = OPERATORS[mt_rand(0, count(OPERATORS) - 1)];
        $question = "{$firstNum} {$randomOperator} {$secondNum}";
        switch ($randomOperator) {
            case '+':
                $questionsAnsewrs[$question] = $firstNum + $secondNum;
                break;
            case '-':
                $questionsAnsewrs[$question] = $firstNum - $secondNum;
                break;
            case '*':
                $questionsAnsewrs[$question] = $firstNum * $secondNum;
                break;
        }
    }
    return $questionsAnsewrs;
}

function startCalcGame()
{
    $questionsAnsewrs = getCalcGameQuestionsAndAnswers();
    startEngine(CALC_RULE, $questionsAnsewrs);
}
