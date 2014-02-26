<?php

$time = time();

for ($i = 1; $i < 300; $i ++) {
    $pentagon = pentagonal($i);
    $sum = 0;
    
    $firstIndex = $i + 1;
    $lastIndex = $firstIndex + 1;
    while (true) {
        $first = pentagonal($firstIndex);
        $last = pentagonal($lastIndex);
        
        if ($last - $first === $pentagon) {
            $sum = $last + $first;
            break;
        } else if ($last - $first < $pentagon) {
            $lastIndex ++;
        } else {
            $firstIndex ++;
            if ($firstIndex === $lastIndex) {
                break;
            }
            $lastIndex = $firstIndex + 1;
        }
        
    }
    
    if ($sum != 0) {
        echo $sum . ' ' . $i . ' ' . $firstIndex . ' ' . $lastIndex . '<br/>';
        if (isPentagonal($sum)) {
            echo $i;
            echo '<br/>Success';
            return;
        }
    }
}

echo '<br/>';
echo "time: " . (time() - $time);

function pentagonal ($n) {
    return $n * (3 * $n - 1) / 2;
}

function isPentagonal ($number) {
    $base = ceil(sqrt(2 * $number/3));
    return $number === intval(pentagonal($base));
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
