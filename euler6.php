<?php
$max = 100;

echo squareOfSum($max) - sumOfSquare($max);

function sumOfSquare($max) {
    return $max * ($max + 1) * (2 * $max + 1) / 6;
}

function squareOfSum ($max) {
    return $max * $max * ($max + 1) * ($max + 1) / 4;
}
