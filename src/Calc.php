<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function calc()
{
    $name = Engine\welcome();

    line("What is the result of the expression?");

    $maxQuestions = 4;

    for ($i = 1; $i < $maxQuestions; $i++) {
        $signs = "+-*";
        $firstVar = rand(1, 100);
        $sign = $signs[rand(0, 2)];
        $secondVar = rand(1, 100);

        switch ($sign) {
            case "+":
                $correctResult = $firstVar + $secondVar;
                break;
            case "-":
                $correctResult = $firstVar - $secondVar;
                break;
            case "*":
                $correctResult = $firstVar * $secondVar;
                break;
        }

        $answer = Engine\getAnswer($firstVar . $sign . $secondVar);

        if ($answer != $correctResult) {
            Engine\wrongAnswer($name, $answer, $correctResult);
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}
