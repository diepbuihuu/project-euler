<?php
b;

//echo pentagonal(46303); die;

//echo isPentagonal(5482660); die;

$time = time();

for ($i = 1; $i < 2000; $i ++) {
    $pentagon = pentagonal($i);
    $candidates = array();

    // f(n+k) - f(n) = k(6n + 3k -1)/2 = f(a)
    // => n = ( 2f(a)/k + 1 - 3k ) / 6;
    // n >= a => k <= a/2
    
    // 2 f(a)
    $fa2 = 2 * $pentagon;
    for ($k = 1; $k < $i/2; $k++) {
        if ($fa2 % $k === 0) {
            $numerator = $fa2 / $k + 1 - 3 * $k;
            if ($numerator % 6 === 0) {
                $candidates[] = array ($numerator/6, $k);
            }
        }
    }
    
    foreach ($candidates as $pair) {
//        echo $i . ' ' . $pair[0] . ' ' . ($pair[0] + $pair[1]) . '<br/>';
        $first = pentagonal($pair[0]);
        $last = pentagonal($pair[0] + $pair[1]);
        if (isPentagonal($first + $last)) {
            echo $pentagon . '<br/>';
            echo "Success";
            return;
        }
        if (isPentagonal($pentagon + $last)) {
            echo $first . '<br/>';
            echo "Success";
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
//    echo $base . ' ';
    return $number === intval(pentagonal($base));
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
