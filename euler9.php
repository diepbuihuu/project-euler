<?php

$sum = 1000;
$maxA = $sum / sqrt(2);

function square($number) {
    return pow($number, 2);
}

for ($a = 1; $a <= $maxA; $a++) {
    $maxB = sqrt (square($sum) - square($a));
    for ($b = 1; $b <= $maxB; $b++) {
        $c = $sum - $a - $b;
        if (square($c) === square($a) + square($b)) {
            echo $a * $b * $c;
            die;
        }
    }
}

