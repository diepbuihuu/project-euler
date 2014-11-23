<?php

$phi = 1.61803398874989484820;

// f(n) = round(phi^n/sqrt(5))
// log(f(n)) > 999 => n*log(phi) - log(5)/2 > 999
// => n > (999 + log(5)/2)/log(phi);

$numOfDigit = 1000;

echo round(($numOfDigit - 1 + log10(5)/2)/log10($phi));
