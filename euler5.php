<?php

$max = 20;

$result = 1;
for ($i = 2; $i <= 20; $i++) {
    $result = lcm($result, $i);
}

echo $result;

// greatest common divisor
function gcd ($a, $b) {
    while (true) {
        if ($a % $b === 0) {
            return $b;
        }
        
        $tmp = $a;
        $a = $b;
        $b = $tmp % $b;
    }  
}

 // least common multiple
function lcm ($a, $b) {
    return $a * $b / gcd($a, $b);
}

