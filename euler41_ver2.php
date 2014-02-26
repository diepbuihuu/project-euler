<?php

//var_dump(permuation(array(3,2,1)));

$permuations = getPan(7);

foreach ($permuations as $number) {
    if (isPrime($number)) {
        echo $number;
        return;
    }
}


function getPan($n) {
    $range = array_reverse(range(1, $n));
    $result = permuation($range);
    
    foreach ($result as $key => $value) {
        $result[$key] = intval($value);
    }
    return $result;
}

function permuation ($charSet) {
    
    if (count($charSet) === 1) {
        return $charSet;
    }
    
    $result = array();
    
    for ($i = 0; $i < count($charSet); $i ++) {
        $tmp = $charSet;
        $current = array_splice($tmp, $i, 1);
        $currentE = $current[0];
        $tail = permuation($tmp);
        foreach ($tail as $tailPermu) {
            $result[] = $currentE . $tailPermu;
        }
    }
    
    return $result;
}

function pandigital ($number) {
    $chars = str_split($number);
    sort($chars);
    $length = count ($chars);

    for ($i = 0; $i < $length; $i ++) {
        if (intval($chars[$i]) !== $i + 1) {
            return false;
        }       
    }
    return true;
}
    
function isPrime($number) {
    $max = sqrt($number);
    
    if ($number % 2 === 0 && $number != 2) {
        return false;
    }
    
    for ($i = 3; $i <= $max; $i ++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    
    return true;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
