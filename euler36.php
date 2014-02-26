<?php

$palindromes = array_merge(getEventPalindrome(),  getOddPolindrome());
$sum = 0;
foreach ($palindromes as $palindrome) {
    $palindrome = intval($palindrome);
    if (palindromicBinary($palindrome)) {
        $sum += $palindrome;
    }
}

echo $sum;


function getEventPalindrome() {
    $result = array();
    for ($i = 1; $i <= 999; $i++) {
        $revert = strrev($i);
        $palidrome = $i . $revert;
        $result[] = $palidrome;
    }
    return $result;
}

function getOddPolindrome() {
    $chaSet = array(0,1,2,3,4,5,6,7,8,9);
    $result = $chaSet;
    for ($i = 1; $i <= 99; $i++) {
        $revert = strrev($i);
        foreach ($chaSet as $char) {
            $result[] = $i . $char . $revert;
        }
    }
    return $result;
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

function palindromicBinary($number) {
    if ($number === 0 || $number === 1) {
        return true;
    }
    
    $lastChar = $number % 2;
    
    if ($lastChar === 0) {
        return false;
    }
    
    $maxExp = intval(log($number, 2));
    
    // remove first char
    $remain = $number - pow(2, $maxExp);
    
    // remove last char
    $remain = ($remain - 1) / 2;
    
    if ($remain === 0) {
        return true;
    }
    
    // remove leading and following zero;
    while ($remain % 2 === 0) {
        $maxExp -= 2;
        if ($remain >= pow(2,$maxExp)) {
            return false;
        }
        $remain = $remain / 2;
    }
    
    // exist leading zero
    if ($remain < pow(2, $maxExp - 2)) {
        return false;
    }
    return palindromicBinary($remain);

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
