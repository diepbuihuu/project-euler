<?php


$startTime = microtime(true);
$maxCycle = 0;
$maxIndex = 1;

for ($i = 1; $i <= 1000; $i++) {
    $cycle = cycle($i);
    if ($cycle > $maxCycle) {
        $maxCycle = $cycle;
        $maxIndex = $i;
    }
    
}

echo $maxCycle . ' ' . $maxIndex;

echo '<br/>';
echo "Time expand: " . (microtime(true) - $startTime);

function isPrime($number) {
    $limit = sqrt($number);
    if ($number % 2 === 0 && $number !== 2) {
        return false;
    }
    for ($i = 3; $i <= $limit; $i+=2) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function getMaxPrime($limit) {
    if ($limit % 2 === 0) {
        $limit = $limit - 1;
    }
    
    for ($j = $limit; $j >= 3; $j -= 2) {
        if (isPrime($j)) {
            return $j;
        }
    }
    return 2;
}


function cycle($number) {
    $remains = array(1);
    $remainer = 1;
    
    while (true) {
        $remainer = ($remainer * 10) % $number;
        if(array_search($remainer, $remains) !== FALSE) {
            $lastIndex = array_search($remainer, $remains);
            return count($remains) - $lastIndex;
        } else {
            $remains[] = $remainer;
        }
        if ($remainer === 0) {
            return 0;
        }
    }
}
