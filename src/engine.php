<?php

namespace BrainGames\engine;

use function cli\line;
use function cli\prompt;

define('BrainGames\engine\GAMES_COUNT', 3);

function startEngine($gameRule, array $questionsAndCorrectAnswers)
{
    line('Welcome to the Brain Game!');
    line($gameRule);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    foreach ($questionsAndCorrectAnswers as $question => $correctAnswer) {
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
