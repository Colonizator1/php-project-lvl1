<?php

namespace BrainGames\games\template;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;
use function BrainGames\functions\evenGameQuestion;
use function BrainGames\functions\evenGameCorrectAnswer;
use function BrainGames\functions\calcGameQuestion;
use function BrainGames\functions\calcGameCorrectAnswer;
use function BrainGames\functions\gcdGameQuestion;
use function BrainGames\functions\gcdGameCorrectAnswer;
use function BrainGames\functions\progrGameQuestion;
use function BrainGames\functions\progrGameCorrectAnswer;
use function BrainGames\functions\primeGameQuestion;
use function BrainGames\functions\primeGameCorrectAnswer;

function getRules($game)
{
    $result = '';
    switch ($game) {
        case 'brain-even':
            $result = 'Answer "yes" if the number is even, otherwise answer "no".';
            break;
        case 'brain-calc':
            $result = 'What is the result of the expression?';
            break;
        case 'brain-gcd':
            $result = 'Find the greatest common divisor of given numbers.';
            break;
        case 'brain-progression':
            $result = 'What number is missing in the progression?';
            break;
        case 'brain-prime':
            $result = 'Answer "yes" if given number is prime. Otherwise answer "no".';
            break;
    }
    return $result;
}
function getQuestion($game)
{
    switch ($game) {
        case 'brain-even':
            $result = evenGameQuestion();
            break;
        case 'brain-calc':
            $result = calcGameQuestion();
            break;
        case 'brain-gcd':
            $result = gcdGameQuestion();
            break;
        case 'brain-progression':
            $result = progrGameQuestion();
            break;
        case 'brain-prime':
            $result = primeGameQuestion();
            break;
    }
    return $result;
}
function getCorrectAnswer($game, $question)
{
    switch ($game) {
        case 'brain-even':
            $result = evenGameCorrectAnswer($question);
            break;
        case 'brain-calc':
            $result = calcGameCorrectAnswer($question);
            break;
        case 'brain-gcd':
            $result = gcdGameCorrectAnswer($question);
            break;
        case 'brain-progression':
            $result = progrGameCorrectAnswer($question);
            break;
        case 'brain-prime':
            $result = primeGameCorrectAnswer($question);
            break;
    }
    return $result;
}
function startGame(int $countReplayGames, $game)
{
    $rules = getRules($game);
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $question = getQuestion($game);
        $correctAnswer = getCorrectAnswer($game, $question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
