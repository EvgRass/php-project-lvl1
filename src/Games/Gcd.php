<?php

namespace Brain\Games\Gcd;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gcd()
{
    $name = Engine\welcome();

    line("Find the greatest common divisor of given numbers.");

    for ($i = 1; $i <= MAXRAUNDS; $i++) {
        $firstVar = rand(1, 100);
        $secondVar = rand(1, 100);
        $correctResult = getGcd($firstVar, $secondVar);

        $answer = Engine\getAnswer("{$firstVar} {$secondVar}");

        if ($answer != $correctResult) {
            Engine\wrongAnswer($name, $answer, $correctResult);
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}

function getGcd($fVar, $sVar)
{
    while (true) {
        if ($fVar === $sVar) {
            return $fVar;
        }
        if ($fVar > $sVar) {
            $fVar -= $sVar;
        } else {
            $sVar -= $fVar;
        }
    }
}
