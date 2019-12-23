<?php

namespace BrainGames\evenGame;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line("Welcome to Brain Games!\nAnswer \"yes\" if the number is even, otherwise answer \"no\".\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    for ($i = 0; $i < 3; $i++) {
        $randomNum = rand(1, 100);
        line("Question: {$randomNum}");
        $answer = prompt("Your answer");
        if ($randomNum % 2 === 0) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            break;
        }
    }
}
