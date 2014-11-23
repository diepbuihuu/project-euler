<?php

$commonFactor = 1;
$product = 0;

for ($i = 1; $i < 100000; $i ++) {
    if (verifyFactor($i, $product) && getPandigital($i) > $product) {
        $product = getPandigital($i);
        echo $i . ' ' . $product . '<br/>';
    }
}

function getPandigital ($factor) {
    $result = '';
    for ($i = 1; $i <= 9; $i ++) {
        $result .= ($factor * $i);
        if (strlen($result) === 9) {
            return intval($result);
        }
    }
    return intval($result);
}

function verifyFactor ($factor, $product) {
    $factlen = strlen($factor);
    $firstChars = substr($product, 0, $factlen);
    if ($factor < $firstChars) {
        return false;
    }
    $products = array();
    for ($i = 1; $i <= 9; $i++) {
        $products[] = $factor * $i;
        $charSet = getCharSet($products);
        if (dubChar($charSet)) {
            return false;
        }
        if (pandigital($charSet)) {
            return true;
        }
    }
    return false;
}

function getCharSet($products) {
    $result = array();
    foreach ($products as $product) {
        $subSet = str_split($product);
        $result = array_merge($result, $subSet);
    }
    sort($result);
    return $result;
}

function dubChar($charSet) {
    if (empty($charSet)) {
        return false;
    }
    $length = count($charSet);
    if ($charSet[0] === '0') {
        return true;
    }
    for ($i = 0; $i < $length - 1; $i ++) {
        if ($charSet[$i] === $charSet[$i+1]) {
            return true;
        }
    }
    return false;
}

function pandigital($charSet) {
    return (count($charSet) === 9);
}
