<?php

namespace BrainGames\games\calcGame;

use function BrainGames\functions\engine;

function calcGameQuestionsAndAnswers($countOfQuestions)
{
    $result = [];
    for ($i = 1; $i <= $countOfQuestions; $i++) {
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
    $countReplayGames = 3;
    $rules = 'What is the result of the expression?';
    $arrQuestionsAnsewrs = calcGameQuestionsAndAnswers($countReplayGames);
    engine($rules, $arrQuestionsAnsewrs);
}
