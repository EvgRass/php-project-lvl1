<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function even()
{
    $name = Engine\welcome();
    $yes = "yes";
    $no = "no";

    line("Answer \"{$yes}\" if the number is even, otherwise answer \"{$no}\".");

    for ($i = 1; $i <= MAXRAUNDS; $i++) {
        $random = rand(1, 100);
        $answer = Engine\getAnswer("{$random}");

        if ($random % 2 === 1 && $answer !== $no) {
            Engine\wrongAnswer($name, $answer, $no);
            return;
        } elseif ($random % 2 === 0 && $answer !== $yes) {
            Engine\wrongAnswer($name, $answer, $yes);
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}
