<?php

// canceling fraction

for ($i = 10; $i <= 99; $i++) {
    $first = intval($i/10);
    $last = $i % 10;
    
    //first last/ last j = first / j
    if ($first < $last) {
        for ($j = 1; $j <= 9; $j ++) {
            $denominator = $last * 10 + $j;
            if ($i * $j === $denominator * $first) {
                echo $first . ' ' . $j . '<br/>';
            }
        }
    }
    
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
