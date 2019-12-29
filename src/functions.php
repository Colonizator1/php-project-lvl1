<?php

namespace BrainGames\functions;

use function cli\line;
use function cli\prompt;

function engine($rules, array $array)
{
    line('Welcome to the Brain Game!');
    line($rules);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    foreach ($array as $question => $correctAnswer) {
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return false;
        }
    }
    line("Congratulations, $name!");
    return true;
}
