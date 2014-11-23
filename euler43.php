<?php

$candidates = array();
$numberLength = 3;

// get last four characters

for ($i = 1; $i <= 999; $i ++) {
    if ($i % 17 === 0 && !dubChar($i)) {
        $candidates[] = $i;
    }
}

//$tmpCandidates = array();
//foreach ($candidates as $candidate) {
//    $chars = getCharSet($candidate, $numberLength);
//    $otherChars = getRemainChars($chars);
//    foreach ($otherChars as $char) {
//        $newNumber = intval($char) * pow(10, $numberLength) + $candidate;
//        if (intval($newNumber/10) % 13 === 0)
//        $tmpCandidates[] = $newNumber;
//    }
//}
$candidates = getCandidate($candidates, 3, 1, 13);
$candidates = getCandidate($candidates, 4, 2, 11);
$candidates = getCandidate($candidates, 5, 3, 7);
$candidates = getCandidate($candidates, 6, 4, 5);
$candidates = getCandidate($candidates, 7, 5, 3);
$candidates = getCandidate($candidates, 8, 6, 2);
$candidates = getCandidate($candidates, 9, 7, 1);

var_dump($candidates);

echo array_sum($candidates);

function getCandidate($candidates, $numberLength, $remove, $prime) {
    $tmpCandidates = array();
    foreach ($candidates as $candidate) {
        $chars = getCharSet($candidate, $numberLength);
        $otherChars = getRemainChars($chars);
        foreach ($otherChars as $char) {
            $newNumber = intval($char) * pow(10, $numberLength) + $candidate;
            if (intval($newNumber/pow(10,$remove)) % $prime === 0)
            $tmpCandidates[] = $newNumber;
        }
    }
    return $tmpCandidates;
}

function getRemainChars($exc) {
    $all = array ('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return array_diff($all, $exc);
}

//echo divisible('1406357289');

function divisible($number) {
    if (strlen($number) != 10 || $number[0] === '0') {
        return false;
    }   
    $primes = array (2,3,5,7,11,13,17);
    
    for ($i = 1; $i <= 7; $i ++) {
        $numerator = intval(substr($number, $i, 3));
        $denominator = $primes[$i - 1];
        if ($numerator % $denominator !== 0) {
            return false;
        }
    }
    return true;
}

function getCharSet($number, $length) {
    $charSet = str_split($number);
    sort($charSet);
    
    $setLength = count($charSet);
    for ($i = 0; $i < $length - $setLength; $i++) {
        array_unshift($charSet, '0');
    } 
    return $charSet;
}

function dubChar($number, $length = 3) {
 
    $charSet = getCharSet($number, $length);
    for ($i = 0; $i < $length - 1; $i ++) {
        if ($charSet[$i] === $charSet[$i+1]) {
            return true;
        }
    }
    return false;
}
