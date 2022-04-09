<?php

namespace Brain\Games\Even;

use Brain\Games\Func;

use function cli\line;
use function cli\prompt;

function even()
{
    $name = Func\welcome();
    $yes = "yes";
    $no = "no";

    line("Answer \"{$yes}\" if the number is even, otherwise answer \"{$no}\".");

    $maxQuestions = 4;

    for ($i = 1; $i < $maxQuestions; $i++) {
        $random = rand(1, 100);
        $answer = Func\getAnswer($random);

        if ($random % 2 === 1 && $answer !== $no) {
            Func\wrongAnswer($name, $answer, $no);
            return;
        } elseif ($random % 2 === 0 && $answer !== $yes) {
            Func\wrongAnswer($name, $answer, $yes);
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}
