<?php

namespace BrainGames\functions;

use function cli\line;
use function cli\prompt;

function printHelloText(string $gameRules)
{
    line('Welcome to the Brain Game!');
    line($gameRules);
    line();
}
function getName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    return $name;
}
function printResult($answer, $correctAnswer)
{
    if ($answer == $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        return false;
    }
}
function gameResult($name, $answer, $correctAnswer, $numberOfGame)
{
    if ($answer == $correctAnswer) {
        line("Correct!");
        if ($numberOfGame == 3) {
            line("Congratulations, $name!");
        }
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $name!");
        return false;
    }
}
function evenGameQuestion()
{
    return mt_rand(1, 100);
}
function evenGameCorrectAnswer($num)
{
    if ($num % 2 === 0) {
        return "yes";
    } else {
        return "no";
    }
}
function calcGameQuestion()
{
    $firstNum = mt_rand(1, 100);
    $secondNum = mt_rand(1, 100);
    $operators = ['+', '-', '*'];
    $randomOperator = $operators[mt_rand(0, count($operators) - 1)];
    return "{$firstNum} {$randomOperator} {$secondNum}";
}
function calcGameCorrectAnswer($question)
{
    $array = explode(' ', $question);
    if ($array[1] === '+') {
        return $array[0] + $array[2];
    } elseif ($array[1] === '-') {
        return $array[0] - $array[2];
    } elseif ($array[1] === '*') {
        return $array[0] * $array[2];
    }
}
function gcdGameQuestion()
{
    $firstNum = mt_rand(1, 100);
    $secondNum = mt_rand(1, 100);
    return "{$firstNum} {$secondNum}";
}
function gcdGameCorrectAnswer($question)
{
    $array = explode(' ', $question);
    $firstNum = $array[0];
    $secondNum = $array[1];
    $firstNum >= $secondNum ? $maxDivisor = $secondNum : $maxDivisor = $firstNum;
    for ($i = $maxDivisor; $i > 0 ; $i-- ) {
        if ($firstNum % $i == 0 && $secondNum % $i == 0) {
            return $i;
        }
    } 
}
