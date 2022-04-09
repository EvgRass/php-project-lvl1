<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function progression()
{
    $name = Engine\welcome();

    line("What number is missing in the progression?");

    for ($i = 1; $i <= MAXRAUNDS; $i++) {
        $progr = getProgression();
        $answer = Engine\getAnswer($progr[0]);

        if ($answer != $progr[1]) {
            Engine\wrongAnswer($name, $answer, $progr[1]);
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}

function getProgression()
{
    $res = ['', 0];
    $firstElement = rand(0, 100);
    $incr = rand(2, 15);
    $disElement = rand(0, 9);

    for ($i = 0; $i < 10; $i++) {
        if ($i === $disElement) {
            $res[0] .= ".. ";
            $res[1] = $firstElement + $incr * $i;
        } else {
            $res[0] .= $firstElement + $incr * $i . " ";
        }
    }

    return $res;
}
