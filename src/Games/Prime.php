<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function prime()
{
    $name = Engine\welcome();

    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

    for ($i = 1; $i <= MAXRAUNDS; $i++) {
        $random = rand(1, 100);
        $correctAnswer = isPrime($random);
        $answer = Engine\getAnswer($random);

        if (!$correctAnswer && $answer !== "no") {
            Engine\wrongAnswer($name, $answer, "no");
            return;
        } elseif ($correctAnswer && $answer !== "yes") {
            Engine\wrongAnswer($name, $answer, "yes");
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}

function isPrime($num)
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
