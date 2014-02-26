<?php

// sum of even fibonacy

$max = 4000000;

$fibonacies = array (2,1);

$result = 2;

while ($fibonacies[0] <= $max) {
    $nexFibo = $fibonacies[0] + $fibonacies[1];
    array_unshift($fibonacies, $nexFibo);
    
    if ($nexFibo > $max) {
        break;
    }
    
    if ($nexFibo % 2 === 0) {
        $result += $nexFibo;
    } 
}

echo $result;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
