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
    switch ($game) {
        case 'brain-even':
            return 'Answer "yes" if the number is even, otherwise answer "no".';
            break;
        case 'brain-calc':
            return 'What is the result of the expression?';
            break;
        case 'brain-gcd':
            return 'Find the greatest common divisor of given numbers.';
            break;
        case 'brain-progression':
            return 'What number is missing in the progression?';
            break;
        case 'brain-prime':
            return 'Answer "yes" if given number is prime. Otherwise answer "no".';
            break;
    }
}
function getQuestion($game)
{
    switch ($game) {
        case 'brain-even':
            return evenGameQuestion();
            break;
        case 'brain-calc':
            return calcGameQuestion();
            break;
        case 'brain-gcd':
            return gcdGameQuestion();
            break;
        case 'brain-progression':
            return progrGameQuestion();
            break;
        case 'brain-prime':
            return primeGameQuestion();
            break;
    }
}
function getCorrectAnswer($game, $question)
{
    switch ($game) {
        case 'brain-even':
            return evenGameCorrectAnswer($question);
            break;
        case 'brain-calc':
            return calcGameCorrectAnswer($question);
            break;
        case 'brain-gcd':
            return gcdGameCorrectAnswer($question);
            break;
        case 'brain-progression':
            return progrGameCorrectAnswer($question);
            break;
        case 'brain-prime':
            return primeGameCorrectAnswer($question);
            break;
    }
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
