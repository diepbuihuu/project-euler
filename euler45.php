<?php

// T(x) = n(n+1)/2
// P(x) = n(3n-1)/2
// H(x) = n(2n-1);
// T285 = P165 = H143 = 40755.

$h1 = 143;

for ($i = $h1 + 1; $i < 1000000; $i++) {
    $candidate = hexagonal($i);
    if (isPentagonal($candidate) && isTriangle($candidate)) {
        echo $candidate;
        break;
    }
}

function hexagonal($n) {
    return $n * (2 * $n - 1);
}

function getTriangleBase($number) {
    return floor(sqrt(2*$number));
}

function isTriangle($number) {
    $base = getTriangleBase($number);
    return $number === intval($base * ($base + 1) / 2);
}

function pentagonal ($n) {
    return $n * (3 * $n - 1) / 2;
}

function isPentagonal ($number) {
    $base = ceil(sqrt(2 * $number/3));
    return $number === intval(pentagonal($base));
}
