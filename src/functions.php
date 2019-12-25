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
