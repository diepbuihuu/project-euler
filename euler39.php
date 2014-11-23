<?php

$max = 1000;
$result = array();

for ($a = 1; $a < $max/2; $a++) {
    for ($b = $a + 1; $b <= $max - 2 * $a; $b++) {
        $c = sqrt (square($a) + square($b));
        if (floor($c) === ceil($c)) {
            $p = $a + $b + $c;
            if (isset($result[$p])) {
                $result[$p] ++;
            } else {
                $result[$p] = 1;
            }
        }
    }
}

arsort($result);

var_dump($result);

function square($number) {
    return pow($number, 2);
}
