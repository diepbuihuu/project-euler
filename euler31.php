<?php


$coins = array(200, 100, 50, 20, 10, 5, 2, 1);

$money = 200;

echo numberOfGroup($money, $coins);

function numberOfGroup($money, $coin) {
    if (count($coin) === 1) {
        return 1;
    }
    
    if ($money === 0) {
        return 1;
    }
    
    $result = 0;
    $biggestCoin = array_shift($coin);
    for ($i = 0; $i <= $money/$biggestCoin; $i++) {
        $result += numberOfGroup($money - $i*$biggestCoin, $coin);
    }
    return $result;
}
