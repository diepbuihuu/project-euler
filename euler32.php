<?php

$products = array();

for ($i = 2; $i <= 99; $i++) {
    if (!charDiff($i)) {
        continue;
    }
    if ($i < 10) {
        $minJ = 1000;
        $maxJ = 9999;
    } else {
        $minJ = 100;
        $maxJ = 999;
    }
    
    for ($j = $minJ; $j <= $maxJ; $j++) {
        if (!charDiff($j)) {
            continue;
        }
        
        $product = $i * $j;
        
        if (!charDiff($product)) {
            continue;
        }
        
        if (isPandigital($i.$j.$product)) {
            $products[] = $product;
            echo $i . ' ' . $j . ' ' . $product . '<br/>';
        }
        
    }
    
}

echo array_sum(array_unique($products));

function charDiff($str) {
    $chars = str_split($str);
    sort($chars);
    for ($i = 0; $i < count($chars) - 1; $i++) {
        if ($chars[$i] === $chars[$i+1]) {
            return false;
        }
    }
    return true;
}

function isPandigital($str) {
    $chars = str_split($str);
    sort($chars);
    $str = implode('', $chars);
    if ($str === '123456789') {
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
