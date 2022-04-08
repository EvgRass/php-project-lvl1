<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function even()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $maxQuestions = 4;

    for ($i = 1; $i < $maxQuestions; $i++) {
        $random = rand(1, 100);
        $answer = prompt("Question: {$random}");
        if ($random % 2 === 1 && $answer === "no" || $random % 2 === 0 && $answer === "yes") {
            line('Correct!');
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
