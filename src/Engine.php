<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

define("MAXRAUNDS", 3);

function welcome()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getAnswer($expression)
{
    return prompt("Question: {$expression}");
}

function wrongAnswer($name, $answerWr, $answerCor)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answerWr, $answerCor);
    line("Let's try again, %s!", $name);
}
