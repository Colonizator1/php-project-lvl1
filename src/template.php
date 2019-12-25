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
    }
}
function startGame(int $countReplayGames, $game)
{
    $rules = getRules($game);
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        switch ($game) {
            case 'brain-even':
                $question = evenGameQuestion();
                $correctAnswer = evenGameCorrectAnswer($question);
                break;
            case 'brain-calc':
                $question = calcGameQuestion();
                $correctAnswer = calcGameCorrectAnswer($question);
                break;
            case 'brain-gcd':
                $question = gcdGameQuestion();
                $correctAnswer = gcdGameCorrectAnswer($question);
        }
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
