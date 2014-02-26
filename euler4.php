<?php

$max = 999;
$min = 100;

$threshole = 900000;

echo getMaxPalindrome($max, $min, $threshole);

function getMaxPalindrome ($max, $min, $threshole) {
    $result = array();
    for ($i = $max; $i >= $threshole / $max; $i --) {
        for ($j = $i; $j >= $threshole / $i; $j --) {
            if (checkPalindrome($i * $j)) {
                $result[] = $i * $j;
            }
        }
    }
    return max($result);
}


function checkPalindrome ($number) {
    $str1 = strval($number);
    $str2 = strrev($str1);
    
    if (strcmp($str1, $str2) === 0) {
        return true;
    } else {
        return false;
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
