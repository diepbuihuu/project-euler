<?php

$numDivisors = array();
$bound = 500;

for ($i = 1; $i < 100000; $i++) {
    $numDivisors[$i] = numDivisor($i);
    if ($i <= 1) {
        continue;
    }
    
    if ($i % 2 === 0) {
        $triangleDivisors = $numDivisors[$i/2] * $numDivisors[$i-1];
    } else {
        $triangleDivisors = $numDivisors[$i] * $numDivisors[($i-1)/2];
    }
    
    if ($triangleDivisors > $bound) {
        echo $i * ($i-1) / 2;
        break;
    }
}

//var_dump($numDivisors); die;

function numDivisor($number) {
    $result = 0;
    $max = sqrt($number);
    for ($i = 1; $i <= $max; $i++) {
        if ($number % $i === 0) {
            if ($i === $number/$i) {
                $result += 1;
            } else {
                $result += 2;
            }
        }
    }
    return $result;
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
