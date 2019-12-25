<?php

namespace BrainGames\games\progrGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\functions\printHelloText;
use function BrainGames\functions\getName;
use function BrainGames\functions\gameResult;

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
function startProgrGame(int $countReplayGames)
{
    $rules = 'What number is missing in the progression?';
    printHelloText($rules);
    $name = getname();
    for ($i = 1; $i <= $countReplayGames; $i++) {
        $question = progrGameQuestion();
        $correctAnswer = progrGameCorrectAnswer($question);
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if (!gameResult($name, $answer, $correctAnswer, $i)) {
            break;
        }
    }
}
