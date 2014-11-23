<?php


function fact($number) {
    if ($number === 1 || $number === 0) {
        return 1;
    } else {
        return $number * fact($number - 1);
    }
}

$initial = 999999;
$initialNumbers = range(0,9);

for ($i = 9; $i >= 0; $i--) {
    $bucket = fact($i);
    $bucketNumber = intval($initial/$bucket);
    $current = array_splice($initialNumbers, $bucketNumber, 1);
    echo $current[0];
    $initial = $initial % $bucket;
}
