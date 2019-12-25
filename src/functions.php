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
function gameResult($name, $answer, $correctAnswer, $numberOfGame)
{
    if ($answer == $correctAnswer) {
        line("Correct!");
        if ($numberOfGame == 3) {
            line("Congratulations, $name!");
        }
        return true;
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
    for ($div = $maxDivisor; $div > 0; $div--) {
        if ($firstNum % $div == 0 && $secondNum % $div == 0) {
            return $div;
        }
    }
}
function progrGameQuestion()
{
    $startProgression = mt_rand(1, 20);
    $diffProgression = mt_rand(1, 10);
    $unknownNum = mt_rand(1, 10);
    $progression = [];
    $progression[0] = $startProgression;
    for ($i = 1; $i < 10; $i++) {
        $progression[$i] = $progression[$i - 1] + $diffProgression;
    }
    $progression[$unknownNum] = "..";
    $strProgression = implode(" ", $progression);
    return "$strProgression";
}
function progrGameCorrectAnswer($question)
{
    $array = explode(' ', $question);
    $unknownNum = array_search("..", $array);
    $halfArray = count($array) / 2;
    if ($unknownNum <= $halfArray) {
        $diffProgression = $array[$halfArray + 2] - $array[$halfArray + 1];
        $array[$unknownNum] = $array[$unknownNum + 1] - $diffProgression;
    } else {
        $diffProgression = $array[$halfArray - 1] - $array[$halfArray - 2];
        $array[$unknownNum] = $array[$unknownNum - 1] + $diffProgression;
    }
    return $array[$unknownNum];
}
function primeGameQuestion()
{
    $num = mt_rand(1, 100);
    return $num;
}
function primeGameCorrectAnswer($num)
{
    for ($i = 2; $i <= floor($num / 2); $i++) {
        if ($num % $i === 0) {
            return "no";
        }
    }
    return "yes";
}
